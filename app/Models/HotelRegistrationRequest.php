<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRegistrationRequest extends Model
{
    protected $fillable = [
        'owner_name',
        'email',
        'phone',
        'hotel_name',
        'city',
        'message',
        'status',
    ];
}