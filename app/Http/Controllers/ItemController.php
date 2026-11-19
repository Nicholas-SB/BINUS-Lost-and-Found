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

    public function dashboard(){
        $overdue = Item::where('status', 'unclaimed')
            ->where('date_found', '<', now()->subWeek())
            ->get();
        
        $items = Item::with('claim')->latest()->paginate(15); // change paginate as however the binusians like it to be. For now, keep at 15 for showcase

        return view('officer.dashboard', compact('overdue', 'items'));
    }

    public function transfer(Item $item){
        $item->update(['status' => 'transferred']);
        return back()->with('success', 'Marked as transferred to BM (Business Management)');
    }

    public function index(Request $request){
        $items = Item::whereIn('status', ['unclaimed', 'transferred'])
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->q}%")
                ->orWhere('location_found', 'like', "%{$request->q}%");
            })
            ->when($request->from, fn($query, $from) => $query->whereDate('date_found', '>=', $from))
            ->when($request->to, fn($query, $to) => $query->whereDate('date_found', '<=', $to))
            ->when($request->category, fn($query, $category) => $query->where('category', $category))
            ->latest('date_found')
            ->paginate(15)
            ->withQueryString();

        return view('items.index', compact('items'));
    }

    public function show(Item $item){
        abort_if($item->status === 'claimed', 404);
        return view('items.show', compact('item'));
    }
}
