<?php 
namespace App\Http\Controllers\CRUD;
use App\Http\Controllers\Controller;
use App\Models\HotelRegistrationRequest;
use App\Mail\HotelRegistrationSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HotelRegisterController extends Controller
{
    public function create()
    {
        return view('hotel-register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',
            'hotel_name' => 'required|string|max:255',
            'city'       => 'required|string|max:255',
            'message'    => 'nullable|string',
        ]);

        $registration = HotelRegistrationRequest::create($validated);

        // Send email notification to SafeNest team
        Mail::to('admin@safenest.com')->send(new HotelRegistrationSubmitted($registration));

        return back()->with('success', 'Thank you! Your request has been received. Our team will contact you shortly.');
    }
}