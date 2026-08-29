<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'hotel_id',
        'room_id',
        'user_id',
        'guest_name',
        'guest_email',
        'guest_phone',
        'check_in',
        'check_out',
        'guests',
        'nights',
        'price_per_night',
        'total_price',
        'status',
        'payment_status',
        'special_requests',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'price_per_night' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    // Statuses that actually block a room from being booked again
    public const BLOCKING_STATUSES = ['pending', 'confirmed', 'checked_in'];

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->order_number ??= 'ORD-' . strtoupper(Str::random(8));

            if ($order->check_in && $order->check_out) {
                $order->nights = $order->check_in->diffInDays($order->check_out);
                $order->total_price = $order->nights * $order->price_per_night;
            }
        });
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** Scope: orders that currently block availability */
    public function scopeBlocking($query)
    {
        return $query->whereIn('status', self::BLOCKING_STATUSES);
    }

    /** Scope: orders overlapping a given date range */
    public function scopeOverlapping($query, $checkIn, $checkOut)
    {
        return $query->where('check_in', '<', $checkOut)
                      ->where('check_out', '>', $checkIn);
    }
}