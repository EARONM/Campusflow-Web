<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticsController;

Route::middleware([
    'auth'
])->group(function () {

    Route::get(
        '/statistics',
        [StatisticsController::class, 'index']
    )->name('statistics');

});