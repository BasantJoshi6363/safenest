<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send a reset link to the given user.
     */
   public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Generate a random plain token
        $plainToken = Str::random(60);

        // Store the hashed token in the database with a timestamp
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => Hash::make($plainToken),
                'created_at' => Carbon::now()
            ]
        );

        // Construct the reset link containing the plain token
        $resetUrl = url("/reset-password?token={$plainToken}&email=" . urlencode($request->email));

        // Send the mail using your Mailable class
        Mail::to($request->email)->send(new ResetPasswordMail($resetUrl));

        return back()->with('status', 'We have emailed your password reset link!');
    }
}