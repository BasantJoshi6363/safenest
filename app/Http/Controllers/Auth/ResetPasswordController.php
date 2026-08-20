<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon; // Or use Carbon\Carbon;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /**
     * Display the password reset view for the given token.
     */
   public function showResetForm(Request $request)
{
    return view('auth.reset-password', [
        'token' => $request->query('token'),
        'email' => $request->query('email')
    ]);
}

    /**
     * Handle a password reset request.
     */
   public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'token' => 'required',
        'password' => 'required|min:8|confirmed',
    ]);

    $record = DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->first();

    // 1. Verify token exists and matches the hash
    if (!$record || !Hash::check($request->token, $record->token)) {
        return back()->withErrors(['token' => 'Invalid password reset token.']);
    }

    // 2. Check token expiration (e.g., 60 minutes)
    if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return back()->withErrors(['token' => 'This reset token has expired.']);
    }

    // 3. Update User Password
    $user = \App\Models\User::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    // 4. Delete token record after successful reset
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    return redirect('/login')->with('status', 'Your password has been successfully reset!');
}
}