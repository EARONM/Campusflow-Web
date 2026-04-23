<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/statistics', function () {
        return view('statistics');
    })->name('statistics');

});