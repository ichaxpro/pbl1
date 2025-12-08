<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\OperatorDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaboratoryStructureController;

// Dashboard

// Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/lab-structure', [LaboratoryStructureController::class, 'index']);

// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware('auth')
//     ->name('dashboard');

// Route::get('/admin-dashboard', [DashboardController::class, 'index'])
//     ->middleware('auth')
//     ->name('admin-dashboard');

// Route::get('/operator_dashboard', [DashboardController::class, 'index'])
//     ->middleware('auth')
//     ->name('operator_dashboard');


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

Route::get('/publications', function () {
    return view('publications/page_publication_article');
});

Route::get('/vision-mission', function () {
    return view('vision_mission');
});



Route::get('/lab_description', function () {
    return view('lab_info');
});

// Route::get('/login', function()  {
//     return view('/login');
// });

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/dashboard', function() {
//     return view('admin/dashboard');
// })->middleware('auth');


Route::get('/footer', function () {
    return view('footer');
});

Route::get('/profile', function () {
    return view('profile/profile_page');
});

Route::get('/sidebar-admin', function () {
    return view('admin/sidebar');
});

Route::get('/sidebar-operator', function () {
    return view('operator/sidebaroperator');
});

Route::get('/sidebar-collapse', function () {
    return view('admin/sidebar_collapse');
});
Route::get('/news', function () {
    return view('news/news_page');
});

Route::get('/publications', function () {
    return view('publications/page_publication');
});

Route::get('/add-activities', function () {
    return view('operator/addActivities');
});

Route::get('/add-facilities', function () {
    return view('operator/addFacilities');
});

Route::get('/user-management', function () {
    return view('admin/user_management');
});
Route::get('/topbar-admin', function () {
    return view('admin/topbar');
});

// LOGIN PAGE
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.page');

// LOGIN ACTION
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {

    Route::get('/admin/dashboard', 
        [AdminDashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::get('/operator/dashboard', 
        [OperatorDashboardController::class, 'index']
    )->name('operator.dashboard');

});

Route::get('/content-management', function () {
    return view('operator/content_management_fix');
});

Route::get('/edit-member', function () {
    return view('admin/edit_member');
});