<?php

use App\Http\Controllers\Api\Car\CarController;
use App\Http\Controllers\Api\Location\SyncCarLocationController;
use Illuminate\Support\Facades\Route;

Route::controller(SyncCarLocationController::class)->group(function () {
    Route::post('locations', 'sync');
});
