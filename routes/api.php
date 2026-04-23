<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AlertController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\ReadingController;

// test
Route::get('/test', function () {
    return response()->json([
        'message' => 'API working'
    ]);
});

// auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// public routes for testing
Route::get('/status', [StatusController::class, 'index']);
Route::get('/alerts', [AlertController::class, 'index']);
Route::get('/history', [HistoryController::class, 'index']);
Route::get('/readings', [ReadingController::class, 'index']);

// protected routes
Route::middleware('auth')->group(function () {

    // logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // current user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile', [ProfileController::class, 'update']);

    // update alert
    Route::put('/alerts/{id}/read', [AlertController::class, 'markAsRead']);

    // save reading
    Route::post('/readings', [ReadingController::class, 'store']);
});