<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition(): array
    {
        return [
            'car_id' => Car::factory()->create()->id,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'registered_at' => now()->timestamp
        ];
    }
}
