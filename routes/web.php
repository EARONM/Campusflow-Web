<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Superadmin + Admin only
    Route::middleware('role:Superadmin,Admin')->group(function () {

        // Manage Users page
        Route::get('/users', [UserManagementController::class, 'index'])
            ->name('users');

        // Create user
        Route::post('/users', [UserManagementController::class, 'store'])
            ->name('users.store');

        // Edit user
            Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])
            ->name('users.edit');

        // Update user
            Route::patch('/users/{user}', [UserManagementController::class, 'update'])
            ->name('users.update');

    });


    // All authenticated users
    Route::get('/alerts', function () {
        return view('alerts');
    })->name('alerts');

    Route::get('/status', function () {
        return view('status');
    })->name('status');

    Route::get('/history', function () {
        return view('history');
    })->name('history');

    Route::get('/readings', function () {
        return view('readings');
    })->name('readings');

});

require __DIR__.'/auth.php';
require __DIR__.'/statistics.php';
require __DIR__.'/reports.php';
require __DIR__.'/notifications.php';
require __DIR__.'/database.php';