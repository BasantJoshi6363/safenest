<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'destination',
        'tagline',
        'description',
        'city',
        'address',
        'latitude',
        'longitude',
        'phone',
        'email',
        'website',
        'featured_image',
        'gallery_images',
        'star_rating',
        'check_in_time',
        'check_out_time',
        'cancellation_policy',
        'free_wifi',
        'swimming_pool',
        'spa_wellness',
        'fitness_center',
        'restaurant',
        'bar_lounge',
        'parking',
        'airport_shuttle',
        'pet_friendly',
        'room_service',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'gallery_images' => 'array', // Keep array only for multi-upload fields
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'star_rating' => 'integer',
        'free_wifi' => 'boolean',
        'swimming_pool' => 'boolean',
        'spa_wellness' => 'boolean',
        'fitness_center' => 'boolean',
        'restaurant' => 'boolean',
        'bar_lounge' => 'boolean',
        'parking' => 'boolean',
        'airport_shuttle' => 'boolean',
        'pet_friendly' => 'boolean',
        'room_service' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}