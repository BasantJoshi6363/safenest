<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function show()
    {
        return view('auth.register'); // Adjust view path if yours is different
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'    => ['nullable', 'string', 'max:20'],
            'country'  => ['nullable', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'phone'    => $validated['phone'] ?? null,
            'country'  => $validated['country'] ?? null,
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('login'); // Redirect to your desired route
    }
}