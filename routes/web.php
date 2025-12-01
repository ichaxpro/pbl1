<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/homepage');
});
Route::get('/header', function () {
    return view('/header/header');
});

Route::get('/navbar', function () {
    return view('/navbar');
});

Route::get('/profile_vision', function () {
    return view('profile/profile_vision');
});

Route::get('/profile_vision_mission', function () {
    return view('profile/profile_vision_mission');
});

Route::get('/background', function () {
    return view('profile/background');
});

Route::get('/lab_description', function () {
    return view('home/lab_info');
});

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/profile', function () {
    return view('profile/profile_page');
});

Route::get('/sidebar', function () {
    return view('admin/sidebar');
});