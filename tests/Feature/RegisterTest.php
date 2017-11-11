<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /** @test */
    public function checkEmail()
    {
        $this->post('/api/checkEmail', ['email' => 'john.doe@example.org'])->assertSuccessful()->assertJson(['exist' => false]);
    }

    /** @test */
    public function checkExistingEmail()
    {
        $user = factory(User::class)->create();

        $this->post('/api/checkEmail', [
            'email' => $user->email,
        ])->assertSuccessful()->assertJson(['exist' => true]);
    }

    /** @test */
    public function canRegister()
    {
        $this->postJson('/api/register', [
            'email' => 'test@test.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ])->assertSuccessful()->assertJson([
            'email' => 'test@test.com',
            'verified_at' => null
        ]);
    }

    /** @test */
    public function registerWithExistingEmail()
    {
        $user = factory(User::class)->create();

        $response = $this->postJson('/api/register', [
            'email' => $user->email,
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $this->assertEquals('The email has already been taken.', $response->original['errors']['email'][0]);
    }
}
