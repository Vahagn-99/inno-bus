<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(static function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
