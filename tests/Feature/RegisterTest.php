<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_register()
    {
        $this->postJson('/api/register', [
            'email' => 'test@test.dk',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ])->assertSuccessful()->assertJsonStructure(['email']);
    }
}
