<?php

namespace App\Services\Location;

use App\DTO\SyncCarLocationDto;
use App\Models\Location;

class SyncFromGPSMicroControllerService implements SyncServiceInterface
{
    public function sync(SyncCarLocationDto $dto): void
    {
        Location::query()->create([
            'car_id' => $dto->car_id,
            'longitude' => $dto->longitude,
            'latitude' => $dto->latitude,
            'registered_at' => now()->timestamp
        ]);
    }
}