<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FacebookLoginController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/hotels', function () {
    return view('hotels');
});

Route::get('/rooms', function () {
    return view('rooms');
});

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    // Google Authentication
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
        ->name('google.redirect');

    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
        ->name('google.callback');

    // Facebook Authentication
    Route::get('/auth/facebook', [FacebookLoginController::class, 'redirect'])
        ->name('facebook.redirect');

    Route::get('/auth/facebook/callback', [FacebookLoginController::class, 'callback'])
        ->name('facebook.callback');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    Route::post('/logout', [GoogleAuthController::class, 'logout'])
        ->name('logout');
});