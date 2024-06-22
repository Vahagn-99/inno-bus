<?php

namespace App\DTO;

class CarFilterDto
{
    public function __construct(
        public string $from,
        public string $to
    )
    {
    }
}