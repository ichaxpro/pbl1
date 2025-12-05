<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\DashboardController;
// Dashboard

Route::get('/dashboard', [DashboardController::class, 'index']);
use App\Http\Controllers\LaboratoryStructureController;

Route::get('/lab-structure', [LaboratoryStructureController::class, 'index']);


Route::get('/test-db', [DatabaseController::class, 'test']);
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
});

Route::get('/news', function () {
    return view('news/news_page');
});

Route::get('/publications', function () {
    return view('publication/publication_page');
});

Route::get('/add-activities', function () {
    return view('operator/addActivities');
});

Route::get('/add-facilities', function () {
    return view('operator/addFacilities');
});

Route::get('/content-management', function () {
    return view('operator/content_management');
});