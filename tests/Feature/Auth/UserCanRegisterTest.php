<?php

namespace Tests\Feature\Auth;

use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserCanRegisterTest extends TestCase
{
    public function test_user_can_register_as_driver(): void
    {
        $response = $this->json('post', '/api/register/driver', [
            'name' => 'Test user',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'name' => 'Test user',
            'email' => 'test@test.com'
        ]);
        $this->assertDatabaseHas('model_has_roles', [
            'role_id' => Role::findByName('driver')->id,
            'model_type' => 'App\\Models\\User'
        ]);
    }

    public function test_user_can_register_as_client(): void
    {
        $response = $this->json('post', '/api/register/client', [
            'name' => 'Test user',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'name' => 'Test user',
            'email' => 'test@test.com'
        ]);
        $this->assertDatabaseHas('model_has_roles', [
            'role_id' => Role::findByName('client')->id,
            'model_type' => 'App\\Models\\User'
        ]);
    }
}
