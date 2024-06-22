<?php

namespace App\Http\Controllers\Api\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Location\SyncCarLocationRequest;
use App\Services\Location\SyncServiceInterface;
use Illuminate\Http\JsonResponse;

class SyncCarLocationController extends Controller
{
    public function __construct(private readonly SyncServiceInterface $syncService)
    {
    }

    public function sync(SyncCarLocationRequest $request): JsonResponse
    {
        $this->syncService->sync($request->toDto());
        return response()->json(['message' => 'success']);
    }
}
