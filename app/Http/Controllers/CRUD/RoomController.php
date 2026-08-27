<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
        'check_in'  => ['nullable', 'date', 'after_or_equal:today'],
        'check_out' => ['nullable', 'date', 'after:check_in'],
        'guests'    => ['nullable', 'integer', 'min:1'],
        'destination' => ['nullable', 'string'],
        'category'  => ['nullable', 'string'],
        'search'    => ['nullable', 'string'],
    ]);

    $query = Room::query()->where('is_active', true)->with('hotel');
        // 1. Destination Filter (Strict search on Hotel destination, city, or address)
        if ($request->filled('destination') && $request->destination !== 'All') {
            $destination = trim($request->destination);
            $query->whereHas('hotel', function ($q) use ($destination) {
                $q->where(function ($sub) use ($destination) {
                    $sub->where('destination', 'like', "%{$destination}%")
                        ->orWhere('city', 'like', "%{$destination}%")
                        ->orWhere('address', 'like', "%{$destination}%");
                });
            });
        }

        // 2. Guest Capacity Filter (Room MUST accommodate AT LEAST the requested guest count)
        if ($request->filled('guests') && (int)$request->guests > 0) {
            $guests = (int) $request->guests;
            $query->where('max_guests', '>=', $guests);
        }

        // 3. Category Filter
        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        // 4. Search Filter (Room Name or Hotel Name)
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('hotel', function ($hq) use ($search) {
                      $hq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // 5. Check-in Stock Filter
        if ($request->filled('check_in')) {
            $query->where('available_rooms', '>', 0);
        }

        $rooms = $query->latest()->paginate(9)->withQueryString();

        return view('rooms', compact('rooms'));
    }
}