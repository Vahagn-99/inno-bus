<?php

namespace App\Enums;

enum RideStatus: string
{
    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case REJECTED = 'rejected';
    case CANCELLED = 'cancelled';
}