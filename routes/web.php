<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\Templates\FacebookController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/admin', [AdminController::class, 'index'])
//     ->name('admin')
//     ->middleware('admin');

Route::get('/facebook', [FacebookController::class, 'show'])->name('facebook');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
    Route::get('/admin/facebook', [FacebookController::class, 'index']);
    Route::post('/admin/facebook', [FacebookController::class, 'store']);
    // ... other admin routes
});