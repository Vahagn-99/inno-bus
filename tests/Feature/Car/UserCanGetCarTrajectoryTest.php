<?php

namespace Tests\Feature\Car;

use App\Models\Car;
use App\Models\Location;
use Tests\TestCase;

class UserCanGetCarTrajectoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_get_cars_trajectory(): void
    {
        $cars = Car::factory()->count(3)->create();
        foreach ($cars as $car) {
            Location::factory(15)->create([
                'car_id' => $car->id,
                'registered_at' => now()->addSeconds(10)->timestamp
            ]);
        }
        $response = $this->get('api/cars');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'cars' => [
                '*' => [
                    'trajectory',
                    'location'
                ]
            ]
        ]);
    }
}
