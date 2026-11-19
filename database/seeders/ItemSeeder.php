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
        $items = [
            ['name' => 'Orange Hydroflask Bottle', 'category' => 'Bottles', 'location_found' => 'LKC Item Shelf', 'date_found' => '2026-11-16', 'photo' => 'hydroflask.jpg'],
            ['name' => 'Blue Plushie', 'category' => 'Other', 'location_found' => 'LKC Discussion Room 9', 'date_found' => '1999-09-09', 'photo' => 'cirnofumo.jpg'],
            ['name' => 'Small Earphone', 'category' => 'Accessories', 'location_found' => 'B0501', 'date_found' => '2026-10-05', 'photo' => 'headphone.jpg'],
            ['name' => 'Pink Plushie', 'category' => 'Other', 'location_found' => 'GOR Gym', 'date_found' => '2026-03-28', 'photo' => 'hoshinoplushie.jpg'],
            ['name' => 'Phone Holder', 'category' => 'Accessories', 'location_found' => 'A1301', 'date_found' => '2026-11-19', 'photo' => 'phonestand.jpg'],
            ['name' => 'Toyota Corolla', 'category' => 'Other', 'location_found' => 'LSC', 'date_found' => '2026-11-13', 'photo' => 'toyotacorolla.jpg'],
        ];

        foreach ($items as $data){
            Storage::disk('public')->putFileAs(
                'items',
                new File(database_path('seeders/photos/' . $data['photo'])),
                $data['photo'],
            ); 

            Item::create([
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
                'category' => $data['category'],
                'location_found' => $data['location_found'],
                'date_found' => $data['date_found'],
                'photo_path' => 'items/' . $data['photo'],
            ]); 
        }
        
        


    }
}
