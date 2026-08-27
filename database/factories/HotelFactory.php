<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    public function definition(): array
    {
        // Define realistic locations across Nepal
        $destinations = [
            'Kathmandu',
            'Pokhara',
            'Chitwan',
            'Mustang',
            'Nagarkot',
            'Lumbini',
            'Dhulikhel',
            'Bandipur',
            'Bhairahawa',
            'Dharan'
        ];

        $destination = $this->faker->randomElement($destinations);

        return [
            'name' => $this->faker->company() . ' Hotel',
            'slug' => $this->faker->unique()->slug(),
            'destination' => $destination,
            'city' => $destination,
            'address' => $this->faker->streetAddress() . ', ' . $destination,
            // ... your other hotel attributes
        ];
    }
}