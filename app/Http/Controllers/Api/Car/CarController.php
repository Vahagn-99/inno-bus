<?php

namespace App\Http\Controllers\Api\Car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
//FilterCarListRequest $request
    public function list(): JsonResponse
    {
//        $filter = $request->toDto();
        // here we should use caching (redis), to minimize query execution to db
        // best solution (websockets) to send data to front-end
        return response()->json([
            'cars' => Car::with(['trajectory', 'location', 'ride'])->get()
        ]);
    }
}
