<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create default admin/user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Create Hotels and associate Rooms
        Hotel::factory(10)->create()->each(function ($hotel) {
            Room::factory(5)->create([
                'hotel_id' => $hotel->id,
            ]);
        });
    }
}