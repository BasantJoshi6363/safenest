<?php

namespace App\Http\Controllers\CRUD;
use App\Http\Controllers\Controller;


use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query()->where('is_active', true)->with('rooms');

        // Location Filter
        if ($request->filled('destination') && $request->destination !== 'All') {
            $query->where('destination', $request->destination);
        }

        // Search Input Filter
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $hotels = $query->latest()->paginate(9)->withQueryString();

        return view('hotels', compact('hotels'));
    }

    public function show(Hotel $hotel)
    {
        abort_unless($hotel->is_active, 404);

        // Load active rooms for this hotel
        $hotel->load(['rooms' => fn ($q) => $q->where('is_active', true)]);

        return view('hotels.show', compact('hotel'));
    }
}