<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testAuth()
    {
        $this->seed(UserSeeder::class);
        $response = Auth::attempt([
            "email" => "syauqidd@gmail.com",
            "password" => "secret"
        ], true);
        self::assertTrue($response);

        $user = Auth::user();
        self::assertNotNull($user);
        self::assertEquals("syauqidd@gmail.com", $user->email);
    }
}
