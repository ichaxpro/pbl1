<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});
Route::get('/header', function () {
    return view('/header/header');
});

Route::get('/navbar', function () {
    return view('/navbar');
});


Route::get('/vision-mission', function () {
    return view('vision_mission');
});



Route::get('/lab_description', function () {
    return view('lab_info');
});
Route::get('/visi-mission', function () {
    return view('/vision_mission');
});