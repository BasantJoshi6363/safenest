<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Sends email using your custom HTML view
        Mail::to('hotelsafenest@gmail.com')->send(new ContactMessageNotification($validated));

        return back()->with('status', 'Thank you for reaching out! We will get back to you shortly.');
    }
}