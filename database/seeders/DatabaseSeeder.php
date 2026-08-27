<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $nepalLocations = ['Kathmandu', 'Pokhara', 'Chitwan', 'Mustang', 'Nagarkot', 'Lumbini', 'Bandipur', 'Dhulikhel'];

        foreach ($nepalLocations as $city) {
            // Create 2 hotels per destination
            Hotel::factory(2)->create([
                'destination' => $city,
                'city' => $city,
            ])->each(function ($hotel) {
                // Seed 4-6 rooms for each hotel with exact matching attributes
                Room::factory(rand(4, 6))->create([
                    'hotel_id' => $hotel->id,
                ]);
            });
        }
    }
}