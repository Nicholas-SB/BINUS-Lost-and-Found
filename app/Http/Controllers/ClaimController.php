<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Claim;

class ClaimController extends Controller
{
    public function create(Item $item){
        if ($item->status === 'claimed'){// can use no conversion, but might cause bugs
            return redirect()->route('officer.dashboard')->with('error', 'That item is already claimed.');
        }

        return view('officer.claims.create', compact('item'));
    }

    public function store(Request $request, Item $item){
        $validated = $request->validate([
            'claimant_name' => 'required|string|max:255',
            'email' => 'nullable|email|required_without:phone',
            'phone' => 'nullable|string|max:20|required_without:email',
            'nim' => 'nullable|string|max:10'
        ]);

        $claim = DB::transaction(function () use ($item, $validated){
            $claim = $item->claim()->create($validated + ['officer_id' => auth()->id()]);
            $item->update(['status' => 'claimed']);
            return $claim;
        });
        return redirect()->route('officer.claims.print', $claim);
    }

    public function print(Claim $claim){
        $claim->load('item', 'officer');
        return view('officer.claims.print', compact('claim'));
    }
}
