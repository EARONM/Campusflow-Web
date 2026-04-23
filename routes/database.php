<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/database', function () {
        return view('database');
    })->name('database');

});