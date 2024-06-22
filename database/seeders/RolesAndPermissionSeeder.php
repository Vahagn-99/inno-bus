<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $client = Role::create(['name' => 'client']);
        $driver = Role::create(['name' => 'driver']);

        $defaultUser = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $defaultUser->syncRoles($admin);
    }
}
