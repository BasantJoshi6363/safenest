<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'image',            // kept for backward compatibility if needed
        'featured_image',   // newly added
        'gallery_images',    // newly added
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
        'gallery_images' => 'array', // Cast JSON string to array
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
}