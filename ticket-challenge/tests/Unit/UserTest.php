<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanBeCreated(): void
    {
        $password = 'password';

        $user = User::factory()->create([
            'name' => 'Jack Ferguson',
            'email' => 'jackferguson@fakeemail.com',
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'remember_token' => Str::random(10),
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Jack Ferguson',
            'email' => 'jackferguson@fakeemail.com',
            'password' => $user->password,
            'remember_token' => $user->remember_token,
        ]);
    }
}