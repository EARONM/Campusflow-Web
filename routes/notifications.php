<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/notifications', function () {
        return view('notifications');
    })->name('notifications');

});