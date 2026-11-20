<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller{
    public function create(){
        return view('officer.items.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'location_found' => 'required|string|max:255',
            'date_found' => 'required|date|before_or_equal:today',
            'photo' => 'required|image|max:2048',
        ]);

        $validated['photo_path'] = $request->file('photo')->store('items', 'public');
        unset($validated['photo']);

        Item::create($validated);

        return redirect()->route('officer.dashboard')->with('success', 'Item logged.');
    }

    public function dashboard(Request $request){        
        $items = Item::with('claim')
            ->filter($request)
            ->when($request->view === 'unclaimed', fn($query) => $query->where('status', 'unclaimed'))
            ->when($request->view === 'claimed', fn($query) => $query->where('status', 'claimed'))
            ->when($request->view === 'transfer', fn($query) => $query->where('status', 'unclaimed')->where('date_found', '<', now()->subWeek()))
            ->when($request->view === 'transferred', fn($query) => $query->where('status', 'transferred'))
            ->latest('date_found')
            ->paginate(15) // change paginate as however the binusians like it to be. For now, keep at 15 for showcase
            ->withQueryString();

        return view('officer.dashboard', compact('items'));
    }

    public function transfer(Item $item){
        $item->update(['status' => 'transferred']);
        return back()->with('success', 'Marked as transferred to BM (Business Management)');
    }

    public function index(Request $request){
        $items = Item::whereIn('status', ['unclaimed', 'transferred'])
            ->filter($request)
            ->latest('date_found')
            ->paginate(15)
            ->withQueryString();

        return view('items.index', compact('items'));
    }

    public function show(Item $item){
        // Guests can't see claimed items; officers can (to reprint the slip or fix the claim)
        abort_if($item->status === 'claimed' && ! auth()->check(), 404);
        $item->load('claim');
        return view('items.show', compact('item'));
    }
}
