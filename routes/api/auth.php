<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->group(function () {
    Route::post('register/driver', 'register');
    Route::post('register/client', 'register');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});