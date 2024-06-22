<?php

namespace App\Services\Location;

use App\DTO\SyncCarLocationDto;

interface SyncServiceInterface
{
    // then in syncing using triggers to update cache
    public function sync(SyncCarLocationDto $dto): void;
}