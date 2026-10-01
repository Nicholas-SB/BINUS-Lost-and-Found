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

    public function claim(){
        return $this->hasOne(Claim::class);
    }
}
