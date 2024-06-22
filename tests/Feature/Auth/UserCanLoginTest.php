<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Tests\TestCase;

class UserCanLoginTest extends TestCase
{
    public function test_user_can_login(): void
    {
        $user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);
        $user->syncRoles('client');
        $response = $this->json('post', '/api/login', [
            'email' => 'test@test.com',
            'password' => 'password',
        ]);
        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);
        $this->actingAs($user);
        $response = $this->json('post', '/api/logout');
        $response->assertStatus(200);
        $this->assertGuest();
    }
}
