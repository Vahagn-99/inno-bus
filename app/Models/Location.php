<?php

namespace App\Models;

use Database\Factories\LocationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $car_id
 * @property string $latitude
 * @property string $longitude
 * @property string $registered_at
 */
class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    public $timestamps = false;
    protected $fillable = [
        'car_id',
        'latitude',
        'longitude',
        'registered_at',
    ];

    protected $casts = [
        'registered_at' => 'datetime',
    ];

    protected static function newFactory(): LocationFactory
    {
        return new LocationFactory;
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

