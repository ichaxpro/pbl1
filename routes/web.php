<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\OperatorDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaboratoryStructureController;
use App\Http\Controllers\ApprovalStatusController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ContentManagementController;
use App\Http\Controllers\AddActivityController;
use App\Http\Controllers\addFacilityController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OperatorContentController;

use App\Http\Controllers\AddPublicationController;
use App\Http\Controllers\AddNewsController;
use App\Http\Controllers\NewsController;
use App\Models\Activity;
use App\Http\Controllers\ActivityController;

Route::get('/profile/activity', [ActivityController::class, 'index'])
    ->name('profile.activity');
use App\Http\Controllers\FacilityListController;
use App\Http\Controllers\PublicationArticleController;
use App\Http\Controllers\FacilityPublicController;
use App\Http\Controllers\PublicationListController;
// Dashboard

// Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/lab-structure', [LaboratoryStructureController::class, 'index']);

Route::get('/profile', [ActivityController::class, 'profile']);

Route::get('/profile', [ActivityController::class, 'profile']);


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

Route::get('/publications/article/{id}', [PublicationArticleController::class, 'show'])->name('publications.show');
Route::get('/publications/article/preview/{id}', [PublicationArticleController::class, 'show1'])->name('publications.show1');
Route::get('/facilities/{id}', [FacilityPublicController::class, 'show'])->name('facilities.show');


    Route::get('/activity/create', [AddActivityController::class, 'create'])->name('activity.create');
    Route::post('/activity', [AddActivityController::class, 'store'])->name('activity.store');

     Route::get('/facility/create', [addFacilityController::class, 'create'])->name('facility.create');
    Route::post('/facility', [addFacilityController::class, 'store'])->name('facility.store');

Route::get('/vision-mission', function () {
    return view('vision_mission');
});

// Route::get('/gallery', function () {
//     return view('operator/operator_gallery');
// });


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
    $activities = Activity::where('status', 'accepted')
        ->orderBy('created_at', 'desc')
        ->get();
    
    $facilities = \App\Models\Facility::where('status', 'accepted')->get();

    return view('profile.profile_page', compact('activities', 'facilities'));
});

Route::get('/sidebar-admin', function () {
    return view('admin/sidebar');
});

Route::get('/sidebar-operator', function () {
    return view('operator/sidebar');
});

Route::get('/sidebar-collapse', function () {
    return view('admin/sidebar_collapse');
});

// NEWS PAGE
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Route::get('/news', function () {
//     return view('news/news_page');
// });

Route::get('/publications', function () {
    $publications = \App\Models\Publication::orderBy('created_at', 'desc')->get();
    return view('publications.page_publication', compact('publications'));
});

Route::get('/add-activities', [AddActivityController::class, 'create']);

// Route::get('/add-publications', function () {
//     return view('operator/addPublication');
// });

Route::get('/add-facilities', [addFacilityController::class, 'create']);

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
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function() {

    Route::get('/admin/dashboard', 
        [AdminDashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::get('/operator/dashboard', 
        [OperatorDashboardController::class, 'index']
    )->name('operator.dashboard');

});

// Route::get('/content-management', function () {
//     return view('operator/content_management');
// });

// Route::get('/content-management-admin', function () {
//     return view('admin/management-content');
// });

Route::get('/topbar-admin', function () {
    return view('topbar');
});

Route::get('/approval_status', function () {
    return view('operator/approval_status');
});

Route::get('/user-management', function () {
    return view('admin/user_management');
});

// Route::get('/operator_gallery', function () {
//     return view('operator/operator_gallery');
// });

// // Route untuk halaman daftar gallery (List)
// Route::get('/operator/gallery', [App\Http\Controllers\GalleryController::class, 'index']); 

// Route untuk halaman form tambah gambar (Add)
// Pastikan ini menunjuk ke file BARU Anda: operator_gallery_add.blade.php
Route::get('/operator/gallery/create', function () {
    return view('operator.operator_gallery_add'); 
}); 

// Route untuk menyimpan data (POST)
Route::post('/operator/gallery/store', [App\Http\Controllers\GalleryController::class, 'store']);

Route::get('/operator_gallery', [ImageController::class, 'index'])->name('gallery.index');
Route::get('/operator_gallery/create', [ImageController::class, 'create'])->name('gallery.create');
Route::post('/operator_gallery/store', [ImageController::class, 'store'])->name('gallery.store');
Route::delete('/operator_gallery/{id}', [ImageController::class, 'destroy'])->name('gallery.delete');


Route::get('/news_detail', function () {
    return view('news/news_detail_page');   
});
// Route::get('/user-management', function () {
//     return view('admin/user_management');
// });

// Route::get('/add-news', function () {
//     return view('operator/addNews');
// });
Route::middleware(['auth'])
    ->prefix('operator')
    ->group(function () {

        Route::get('/news/add', [AddNewsController::class, 'create'])
            ->name('operator.news.create');

        Route::post('/news/add', [AddNewsController::class, 'store'])
            ->name('operator.news.store');
    });

Route::get('/approval-status', [ApprovalStatusController::class, 'index'])
    ->name('operator.approval_status');

// USER MANAGEMENT
Route::middleware(['auth'])->group(function() {
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management');
    Route::post('/user-management/store', [UserManagementController::class, 'store'])->name('user.store');
    Route::post('/user-management/update/{id}', [UserManagementController::class, 'update'])->name('user.update');
    Route::delete('/user-management/delete/{id}', [UserManagementController::class, 'delete'])->name('user.delete');
});

Route::get('/admin/content', [ContentManagementController::class, 'index'])
    ->name('content.management');

// Actions
Route::post('/admin/content/{table}/{id}/approve', [ContentManagementController::class, 'approve']);
Route::post('/admin/content/{table}/{id}/reject', [ContentManagementController::class, 'reject']);
Route::get('/admin/content/{table}/{id}/preview', [ContentManagementController::class, 'preview'])
    ->name('admin.content.preview');

// Route::get('/content-management', [OperatorContentController::class, 'index'])
//     ->name('operator.content_management');

// Operator Content Management
Route::get('/content-management', 
    [OperatorContentController::class, 'index']
)->name('operator.content_management');

// Delete content
Route::delete('/content-management/{table}/{id}', 
    [OperatorContentController::class, 'delete']
)->name('operator.content.delete');

Route::middleware('auth')->group(function () {

    // Show Add Publication page
    Route::get('/operator/publication/add', 
        [AddPublicationController::class, 'create']
    )->name('operator.publication.create');

    // Handle Publication Submit
    Route::post('/operator/publication/store', 
        [AddPublicationController::class, 'store']
    )->name('operator.publication.store');

});