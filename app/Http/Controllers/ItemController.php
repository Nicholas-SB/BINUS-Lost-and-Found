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
        
        $items = Item::with('claim')->latest()->paginate(20);

        return view('officer.dashboard', compact('overdue', 'items'));
    }

    public function transfer(Item $item){
        $item->update(['status' => 'transferred']);
        return back()->with('success', 'Marked as transferred to BM (Business Management)');
    }
}
