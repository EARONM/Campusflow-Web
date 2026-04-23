<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/reports', function () {
        return view('reports');
    })->name('reports');

});