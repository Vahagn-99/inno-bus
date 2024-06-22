<?php

namespace Tests\Feature\Location;

use App\Models\Car;
use Tests\TestCase;

class CanSyncCarLocationTest extends TestCase
{

    public function test_can_sync_car_current_location(): void
    {
        $car = Car::factory()->create();
        $params = [
            'car_id' => $car->id,
            'latitude' => 4545454,
            'longitude' => 121354,
        ];

        $response = $this->json('post', 'api/locations', $params);

        $response->assertStatus(200);
        $this->assertDatabaseHas('locations', [
            'car_id' => $car->id,
            'latitude' => $params['latitude'],
            'longitude' => $params['longitude'],
        ]);
    }
}
