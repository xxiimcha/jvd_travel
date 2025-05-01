<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TourController;

// Admin Auth Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/logout', fn() => redirect('/admin/login'))->name('logout');

    // Admin Dashboard
    Route::get('/', fn() => view('admin.index'))->name('admin.dashboard');

    // Tour Management Routes
    Route::prefix('tours')->group(function () {
        Route::get('/', [TourController::class, 'index'])->name('admin.tours.index');
        Route::get('/create', [TourController::class, 'create'])->name('admin.tours.create');
        Route::post('/store', [TourController::class, 'store'])->name('admin.tours.store');
        // Additional routes (edit, update, delete) can be added here later
    });
});
