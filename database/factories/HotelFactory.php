<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HotelFactory extends Factory
{
    protected $model = Hotel::class;

    public function definition(): array
    {
        $destinations = ['Kathmandu', 'Pokhara', 'Chitwan', 'Mustang', 'Nagarkot', 'Lumbini'];
        $selectedCity = $this->faker->randomElement($destinations);
        $name = $this->faker->company() . ' Hotel';

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'destination' => $selectedCity, // Populates destination field
            'tagline' => $this->faker->catchPhrase(),
            'description' => $this->faker->paragraph(4),
            'city' => $selectedCity,        // Populates city field to match
            'address' => $this->faker->streetAddress() . ', ' . $selectedCity,
            'latitude' => $this->faker->latitude(26.0, 30.0),
            'longitude' => $this->faker->longitude(80.0, 88.0),
            'phone' => '+977-1-' . $this->faker->numerify('#######'),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'featured_image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=1000',
            'gallery_images' => [
                'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&q=80&w=800',
                'https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&q=80&w=800',
            ],
            'star_rating' => $this->faker->numberBetween(3, 5),
            'check_in_time' => '14:00',
            'check_out_time' => '12:00',
            'cancellation_policy' => 'Free cancellation up to 48 hours before check-in.',
            'free_wifi' => $this->faker->boolean(90),
            'swimming_pool' => $this->faker->boolean(60),
            'spa_wellness' => $this->faker->boolean(40),
            'fitness_center' => $this->faker->boolean(50),
            'restaurant' => true,
            'bar_lounge' => $this->faker->boolean(70),
            'parking' => true,
            'airport_shuttle' => $this->faker->boolean(60),
            'pet_friendly' => $this->faker->boolean(20),
            'room_service' => true,
            'is_featured' => $this->faker->boolean(30),
            'is_active' => true,
        ];
    }
}