<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_if_login_returns_access_token()
    {
        $user = User::factory(1)
        ->set('name', 'test')
        ->set('slug', 'test')
        ->set('email', 'test@mail.com')
        ->set('password', Hash::make('password'))
        ->create();

        $response = $this->post('/api/authenticate', [
            'email' => 'test@mail.com',
            'password' => 'password',
        ]);

        $response->assertJson(fn (AssertableJson $json) =>
        $json->hasAll(['status', 'token'])
        );

        $response->assertStatus(200);
    }

    public function test_if_incorrect_credentials_return_access_token()
    {
        $user = User::factory(1)
        ->set('name', 'test')
        ->set('slug', 'test')
        ->set('email', 'test@mail.com')
        ->set('password', Hash::make('password'))
        ->create();

        $response = $this->post('/api/authenticate', [
            'email' => 'test@mail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(401)
        ->assertExactJson([
            'status' => 401,
            'message' => 'invalid credentials'
        ]);
    }
}
