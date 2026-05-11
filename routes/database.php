<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;


Route::middleware(['auth'])->group(function () {

    Route::get(
        '/database',
        [DatabaseController::class, 'index']
    )->name('database');

});