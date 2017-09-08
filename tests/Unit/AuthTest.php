<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function can_register()
    {
        $this->postJson('/api/register', [
            'email' => 'test@test.app',
            'password_confirmation' => 'secret',
        ])->seeStatusCode(200);

            //->assertSuccessful()->assertJsonStructure(['id', 'email']);


    }
}
