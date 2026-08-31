<?php

use App\Http\Controllers\PAYMENT\EsewaController;
use App\Http\Controllers\CRUD\OrderController;
use App\Http\Controllers\PAYMENT\StripeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\FacebookLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SettingsController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\ContactController;
use App\Http\Controllers\CRUD\HotelController;
use App\Http\Controllers\CRUD\RoomController;


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
    // Authentication
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Google Authentication
    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');

    // Facebook Authentication
    Route::get('/auth/facebook', [FacebookLoginController::class, 'redirect'])->name('facebook.redirect');
    Route::get('/auth/facebook/callback', [FacebookLoginController::class, 'callback'])->name('facebook.callback');

    // Password Reset Routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

    Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
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

    Route::post('/logout', [GoogleAuthController::class, 'logout'])->name('logout');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');

    // Settings
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    //orders
    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
});

/*
|--------------------------------------------------------------------------
| Contact Form Routes
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Hotels Routes
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{hotel:slug}', [HotelController::class, 'show'])->name('hotels.show');

// Rooms Route
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::get('/rooms/{room:slug}', [RoomController::class, 'show'])->name('rooms.show');

Route::get('/rooms/{room:slug}', [RoomController::class, 'show'])->name('rooms.show');
Route::post('/rooms/{room:slug}/book', [OrderController::class, 'confirm'])->name('orders.confirm');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order:order_number}', [OrderController::class, 'success'])->name('orders.success');

Route::get('/payments/esewa/{order:order_number}/initiate', [EsewaController::class, 'initiate'])->name('payments.esewa.initiate');
Route::get('/payments/esewa/success', [EsewaController::class, 'success'])->name('payments.esewa.success');
Route::get('/payments/esewa/failure', [EsewaController::class, 'failure'])->name('payments.esewa.failure');
Route::get('/payments/stripe/{order:order_number}/initiate', [StripeController::class, 'initiate'])->name('payments.stripe.initiate');
Route::get('/payments/stripe/success', [StripeController::class, 'success'])->name('payments.stripe.success');


