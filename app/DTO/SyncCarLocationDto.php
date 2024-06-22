<?php

namespace App\DTO;

class SyncCarLocationDto
{
    public function __construct(
        public string $car_id,
        public string $longitude,
        public string $latitude
    )
    {
    }
}