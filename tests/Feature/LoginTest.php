<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\CallsApi;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use CallsApi;

    /** @test */
    public function can_authenticate()
    {
        $this->postJson('/api/login', [
            'email' => factory(User::class)->create()->email,
            'password' => 'secret',
        ])->assertSuccessful()->assertJsonStructure(['token']);
    }

    /** @test */
    public function can_fetch_the_current_user()
    {
        $this->authenticate($user = factory(User::class)->create());

        $this->get('/api/user')->assertJson([
            'id' => $user->id,
            'email' => $user->email
        ])->assertSuccessful()->assertJsonStructure([
            'id',
            'email',
            'phone',
            'verified_at'
        ]);
    }

    /** @test */
    public function user_can_not_login_without_email_verification()
    {
        $this->postJson('/api/login', [
            'email' => factory(User::class)->create(['verified_at' => null])->email,
            'password' => 'secret',
        ])->assertStatus(422);
    }
}
