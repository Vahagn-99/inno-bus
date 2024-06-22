<?php

namespace Database\Factories;

use App\Enums\RideStatus;
use App\Models\Car;
use App\Models\Ride;
use Illuminate\Database\Eloquent\Factories\Factory;

class RideFactory extends Factory
{
    protected $model = Ride::class;

    public function definition(): array
    {
        $car = Car::factory()->create();
        return [
            'car_id' => $car->id,
            'status' => RideStatus::PENDING,
            'from_latitude' => $this->faker->latitude,
            'from_longitude' => $this->faker->longitude,
            'to_latitude' => $this->faker->latitude,
            'to_longitude' => $this->faker->longitude
        ];
    }
}
