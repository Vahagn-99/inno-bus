<?php

namespace App\Http\Controllers\Api\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Car\FilterCarListRequest;
use App\Models\Car;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
//FilterCarListRequest $request
    public function list(): JsonResponse
    {
//        $filter = $request->toDto();

        return response()->json([
            'cars' => Car::with(['trajectory', 'location', 'ride'])->get()
        ]);
    }
}
