<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        // If hotels exist, attach 3 to 6 rooms to each hotel
        Hotel::all()->each(function ($hotel) {
            Room::factory()
                ->count(20)
                ->create([
                    'hotel_id' => $hotel->id,
                ]);
        });
    }
}