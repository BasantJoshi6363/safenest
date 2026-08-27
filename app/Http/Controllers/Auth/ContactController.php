<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageNotification;
use Illuminate\Http\Request;
use App\Models\Contact;
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
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email:rfc', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:30'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        Contact::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'message' => "Subject: {$validated['subject']}\nPhone: " . ($validated['phone'] ?? 'N/A') . "\n\nMessage:\n{$validated['message']}",
            'is_read' => false,
        ]);

         Mail::to(config('mail.contact_address'))
            ->send(new ContactMessageNotification($validated));

    

        return back()->with(
            'status',
            'Thank you for contacting SafeNest. Your message has been received successfully.'
        );
    }
}