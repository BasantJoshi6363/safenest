<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition(): array
    {
        // Define realistic room presets tailored for Nepal hotels
        $roomTypes = [
            [
                'name' => 'Deluxe Himalayan Mountain View Room',
                'category' => 'Deluxe',
                'bed_type' => '1 King Bed',
                'max_guests' => 2,
                'min_price' => 4500,
                'max_price' => 8500,
                'size' => 32.00,
                'featured_image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&q=80&w=800',
                'balcony' => true,
                'wifi' => true,
                'room_heater' => true,
                'air_conditioning' => true,
                'breakfast' => true,
            ],
            [
                'name' => 'Lakeside Executive Suite',
                'category' => 'Suite',
                'bed_type' => '1 Super King Bed',
                'max_guests' => 3,
                'min_price' => 12000,
                'max_price' => 24000,
                'size' => 55.00,
                'featured_image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&q=80&w=800',
                'balcony' => true,
                'wifi' => true,
                'smart_tv' => true,
                'coffee_machine' => true,
                'mini_bar' => true,
                'breakfast' => true,
                'lounge_area' => true,
            ],
            [
                'name' => 'Standard Double City View',
                'category' => 'Standard',
                'bed_type' => '2 Twin Beds',
                'max_guests' => 2,
                'min_price' => 2500,
                'max_price' => 4200,
                'size' => 24.00,
                'featured_image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800',
                'balcony' => false,
                'wifi' => true,
                'smart_tv' => false,
                'room_heater' => true,
                'breakfast' => false,
            ],
            [
                'name' => 'Heritage Garden Cottage',
                'category' => 'Cottage',
                'bed_type' => '1 Queen Bed',
                'max_guests' => 2,
                'min_price' => 6000,
                'max_price' => 11000,
                'size' => 40.00,
                'featured_image' => 'https://images.unsplash.com/photo-1591088398332-8a7791972843?auto=format&fit=crop&q=80&w=800',
                'balcony' => false,
                'garden_access' => true,
                'wifi' => true,
                'breakfast' => true,
                'refreshments' => true,
            ],
            [
                'name' => 'Safari Jungle Villa Suite',
                'category' => 'Villa',
                'bed_type' => '2 King Beds',
                'max_guests' => 4,
                'min_price' => 9500,
                'max_price' => 18000,
                'size' => 65.00,
                'featured_image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&q=80&w=800',
                'balcony' => true,
                'wifi' => true,
                'meals_included' => true,
                'safari_guidance' => true,
                'breakfast' => true,
            ]
        ];

        // Pick one room preset randomly
        $room = $this->faker->randomElement($roomTypes);
        $name = $room['name'] . ' ' . $this->faker->numberBetween(101, 409);

        $totalRooms = $this->faker->numberBetween(3, 10);

        return [
            'hotel_id' => Hotel::factory(),
            'name' => $name,
            'slug' => Str::slug($name) . '-' . Str::random(5),
            'category' => $room['category'],
            'description' => $this->faker->paragraph(3),
            'max_guests' => $room['max_guests'],
            'bed_type' => $room['bed_type'],
            'size' => $room['size'] ?? 30.00,
            'size_unit' => 'sqm',
            'price_per_night' => $this->faker->numberBetween($room['min_price'], $room['max_price']),
            
            // Image handling
            'image' => $room['featured_image'],
            'featured_image' => $room['featured_image'],
            'gallery_images' => [
                'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800',
            ],

            // Amenities
            'balcony' => $room['balcony'] ?? $this->faker->boolean(60),
            'wifi' => $room['wifi'] ?? true,
            'smart_tv' => $room['smart_tv'] ?? $this->faker->boolean(70),
            'breakfast' => $room['breakfast'] ?? $this->faker->boolean(50),
            'coffee_machine' => $room['coffee_machine'] ?? $this->faker->boolean(40),
            'air_conditioning' => $room['air_conditioning'] ?? $this->faker->boolean(80),
            'room_heater' => $room['room_heater'] ?? $this->faker->boolean(75),
            'private_bathroom' => true,
            'toiletries' => true,
            'garden_access' => $room['garden_access'] ?? $this->faker->boolean(30),
            'lounge_area' => $room['lounge_area'] ?? $this->faker->boolean(30),
            'meals_included' => $room['meals_included'] ?? $this->faker->boolean(25),
            'safari_guidance' => $room['safari_guidance'] ?? $this->faker->boolean(20),
            'mini_bar' => $room['mini_bar'] ?? $this->faker->boolean(40),
            'refreshments' => $room['refreshments'] ?? $this->faker->boolean(50),

            // Availability & status
            'total_rooms' => $totalRooms,
            'available_rooms' => $this->faker->numberBetween(1, $totalRooms),
            'is_active' => true,
        ];
    }
}