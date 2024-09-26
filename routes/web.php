<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\RoleController; 
use App\Http\Controllers\DashboardController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Root route - redirect to login page if not authenticated
Route::get('/', function () {
    return Auth::check() ? redirect()->route('home') : redirect()->route('login'); // Redirect to home after login
});

// Dashboard route, accessible to authenticated and verified users
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes that require authentication
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password'); // New password change route
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product routes, accessible to all authenticated users
    Route::resource('products', ProductController::class); // Now accessible to all authenticated users

    // Admin routes, accessible by Admin only
    Route::middleware(['role:Admin'])->group(function () {
        // User Management routes
        Route::resource('users', UserController::class); // This will handle all user routes

        // Role routes
        Route::resource('roles', RoleController::class); // Assuming you want to manage roles as well
    });

    // Logout route
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Directory Route
    Route::get('/directory', function () {
        return view('directory.index');
    })->name('directory.index');
});

// Auth routes
require __DIR__.'/auth.php'; // Ensure this is included once

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
