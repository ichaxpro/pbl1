<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/homepage');
})->name('homepage');
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

Route::get('/login', function()  {
    return view('/login');
});

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/profile', function () {
    return view('profile/profile_page');
})->name('profile');

Route::get('/news', function () {
    return view('news/news_page');
})->name('news');

Route::get('/publication', function () {
    return view('publication/publication_page');
})->name('publication');
