<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function check_email()
    {
        $this->post('/api/checkEmail', [
            'email' => 'john.doe@example.org',
        ])->assertSuccessful()->assertJson(['exist' => false]);
    }

    /** @test */
    public function check_existing_email()
    {
        $user = factory(User::class)->create();

        $this->post('/api/checkEmail', [
            'email' => $user->email,
        ])->assertSuccessful()->assertJson(['exist' => true]);
    }

    /** @test */
    public function can_register()
    {
        $this->postJson('/api/register', [
            'email' => 'test@test.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ])->assertSuccessful()->assertJsonStructure(['email']);
    }

    /** @test */
    public function duplicate_email()
    {
        $this->postJson('/api/register', [
            'email' => 'test@test.dk',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response =  $this->postJson('/api/register', [
            'email' => 'test@test.dk',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $this->assertEquals('The email has already been taken.', $response->original['errors']['email'][0]);
    }
}
