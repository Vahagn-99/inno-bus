<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Ride;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolesAndPermissionSeeder::class);
        $car = Car::factory()->create([
            'id' => '77MK001'
        ]);

        Ride::factory()->create([
            'car_id' => $car->id,
            'status' => 'pending',
            'from_latitude' => 40.87877,
            'from_longitude' => 45.14851,
            'to_latitude' => 40.74103,
            'to_longitude' => 44.86362,
        ]);
    }
}
