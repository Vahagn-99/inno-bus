<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->realText(10),
            'name' => $this->faker->name,
            'marca' => $this->faker->text(10),
            'model' => $this->faker->text(10),
            'year' => $this->faker->numberBetween(2000, 2021),
            'color' => $this->faker->colorName(),
        ];
    }
}
