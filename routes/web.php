<?php

use App\Http\Controllers\ProfileController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', function () {
        return view('users');
    })->name('users');

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