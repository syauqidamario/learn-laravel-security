<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HashTest extends TestCase
{
    public function testHash()
    {
        $password = "secret";
        $hash = Hash::make($password);

        $this->assertTrue(Hash::check($password, $hash));
    }
}
