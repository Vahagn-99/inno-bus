<?php

namespace App\Models;

use Database\Factories\RideFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $car_id
 * @property string $status
 * @property string $from_latitude
 * @property string $from_longitude
 * @property string $to_latitude
 * @property string $to_longitude
 */
class Ride extends Model
{
    use HasFactory;

    protected $table = 'rides';

    protected $fillable = [
        'car_id',
        'status',
        'from_latitude',
        'from_longitude',
        'to_latitude',
        'to_longitude'
    ];

    protected static function newFactory(): RideFactory
    {
        return new RideFactory;
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(
            Car::class,
            'car_id',
            'id'
        );
    }


}
