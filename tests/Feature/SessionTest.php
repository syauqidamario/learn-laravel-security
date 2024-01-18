<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionTest extends TestCase
{
    public function testLogin()
    {
        $this->seed(UserSeeder::class);

        $this->get('/users/login?email=syauqidamario@gmail.com&password=secretsecret')->assertRedirect("/users/current");

        $this->get('/users/login?email=wrong&password=wrong')->assertSeeText("Wrong credentials");
    }

    public function testCurrent()
    {
        $this->seed(UserSeeder::class);

        $this->get('/users/current')->assertSeeText("Hello Guest");

        $user = User::where("email", "syauqidamario@gmail.com")->first();
        $this->actingAs($user)
            ->get('/users/current')
            ->assertSeeText("Hello Syauqi Damario Djohan");
    }
}
