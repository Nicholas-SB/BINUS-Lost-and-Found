<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'location_found',
        'date_found',
        'photo_path',
        'status',
    ];

    protected $casts = [
        'date_found' => 'date',
    ];

    // Shared search/date/category filters, used by both the public list and the officer dashboard
    public function scopeFilter($query, $request){
        return $query
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->q}%")
                    ->orWhere('location_found', 'like', "%{$request->q}%");
            })
            ->when($request->from, fn($query, $from) => $query->whereDate('date_found', '>=', $from))
            ->when($request->to, fn($query, $to) => $query->whereDate('date_found', '<=', $to))
            ->when($request->category, fn($query, $category) => $query->where('category', $category));
    }

    public function claim(){
        return $this->hasOne(Claim::class);
    }
}
