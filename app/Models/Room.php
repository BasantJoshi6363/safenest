<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; // 1. Import HasMany

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'name',
        'slug',
        'category',
        'description',
        'max_guests',
        'bed_type',
        'size',
        'size_unit',
        'price_per_night',
        'image',
        'featured_image',
        'gallery_images',
        'balcony',
        'wifi',
        'smart_tv',
        'breakfast',
        'coffee_machine',
        'air_conditioning',
        'room_heater',
        'private_bathroom',
        'toiletries',
        'garden_access',
        'lounge_area',
        'meals_included',
        'safari_guidance',
        'mini_bar',
        'refreshments',
        'total_rooms',
        'available_rooms',
        'is_active',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'size' => 'decimal:2',
        'price_per_night' => 'decimal:2',
        'balcony' => 'boolean',
        'wifi' => 'boolean',
        'smart_tv' => 'boolean',
        'breakfast' => 'boolean',
        'coffee_machine' => 'boolean',
        'air_conditioning' => 'boolean',
        'room_heater' => 'boolean',
        'private_bathroom' => 'boolean',
        'toiletries' => 'boolean',
        'garden_access' => 'boolean',
        'lounge_area' => 'boolean',
        'meals_included' => 'boolean',
        'safari_guidance' => 'boolean',
        'mini_bar' => 'boolean',
        'refreshments' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    // 2. Add this bookings relationship method
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function orders(): HasMany
{
    return $this->hasMany(Order::class);
}
}