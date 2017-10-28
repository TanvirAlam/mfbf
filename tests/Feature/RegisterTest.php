<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_register()
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
    public function duplicate_email()
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
