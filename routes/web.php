<?php

use Illuminate\Support\Facades\Route;

Route::get('/login',function() {
    return view('auth.login');
});

Route::get('/register',function() {
    return view('auth.register');
});
Route::get('/about',function() {
    return view('about');
});
Route::get('/contact',function() {
    return view('contact');
});

Route::get('/hotels', function () {
    return view('hotels');
});

Route::get('/rooms', function () {
    return view('rooms');
});

Route::get('/',function() {
    return view('welcome');
});


Route::post('/login');
