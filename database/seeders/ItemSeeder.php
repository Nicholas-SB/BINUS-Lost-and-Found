<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->putFileAs(
            'items',
            new File(database_path('seeders/photos/hydroflask.jpg')),
            'hydroflask.jpg',
        );

        Item::create([
            'name' => 'Orange Hydroflask Bottle',
            'description' => null,
            'category' => 'Bottles',
            'location_found' => 'Alam Sutera LKC',
            'date_found' => '2026-11-17',
            'photo_path' => 'items/hydroflask.jpg',
        ]); 
    }
}
