<?php

namespace App\Services\Location;

use App\DTO\SyncCarLocationDto;

interface SyncServiceInterface
{
    public function sync(SyncCarLocationDto $dto): void;
}