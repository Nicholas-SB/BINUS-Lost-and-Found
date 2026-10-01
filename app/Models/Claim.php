<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = [
        'item_id',
        'claimant_name',
        'email',
        'phone',
        'nim',
        'claimed_at',
        'officer_id'
    ];

    protected $casts = [
        'claimed_at' => 'datetime',
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function officer(){
        return $this->belongsTo(User::class, 'officer_id');
    }
}
