<?php

use App\Http\Controllers\Api\Car\CarController;
use Illuminate\Support\Facades\Route;

Route::controller(CarController::class)->group(function () {
    Route::get('cars', 'list');
    Route::get('cars/{car}', 'item');
});
