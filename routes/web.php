<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\Admin\CampusController;
use App\Http\Controllers\Admin\ResourceMeterController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\ResourceTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlertController;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->middleware([
    'auth',
    'verified'
])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get(
        '/dashboard/live-data',
        [DashboardController::class, 'liveData']
    );

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // SuperAdmin only
    Route::middleware('role:SuperAdmin')->group(function () {

        Route::get(
            '/users',
            [UserManagementController::class, 'index']
        )->name('users');

        Route::post(
            '/users',
            [UserManagementController::class, 'store']
        )->name('users.store');

        Route::get(
            '/users/{user}/edit',
            [UserManagementController::class, 'edit']
        )->name('users.edit');

        Route::patch(
            '/users/{user}',
            [UserManagementController::class, 'update']
        )->name('users.update');

        Route::resource(
            'campuses',
            CampusController::class
        );

        Route::resource(
            'resource-types',
            ResourceTypeController::class
        );
    });


    // SuperAdmin + CampusAdmin
    Route::middleware(
        'role:SuperAdmin,CampusAdmin'
    )->group(function () {

        Route::resource(
            'resource-meters',
            ResourceMeterController::class
        );

        Route::resource(
            'buildings',
            BuildingController::class
        );
    });


    // All authenticated users

    Route::patch(
        '/alerts/{alert}/resolve',
        [AlertController::class, 'resolve']
    )->name('alerts.resolve');

    Route::patch(
        '/alerts/{alert}/read',
        [AlertController::class, 'markAsRead']
    )->name('alerts.read');

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