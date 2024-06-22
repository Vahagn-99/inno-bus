<?php

namespace App\Models;

use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $id
 * @property string $name
 * @property string $marca
 * @property string $model
 * @property null|string $year
 * @property null|string $color
 * @property null|string $image
 */
class Car extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'marca',
        'model',
        'year',
        'color',
        'image',
    ];

    protected static function newFactory(): CarFactory
    {
        return new CarFactory;
    }

    public function trajectory(): HasMany
    {
        return $this->hasMany(
            Location::class,
            'car_id',
            'id',
        );
    }

    public function location(): HasOne
    {
        return $this->hasOne(
            Location::class,
            'car_id',
            'id',
        )
            ->orderByDesc('id')
            ->limit(1);
    }

    public function ride(): HasOne
    {
        return $this->hasOne(
            Ride::class,
            'car_id',
            'id'
        );
    }
}
