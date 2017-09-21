<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginTest extends TestCase
{
    //use DatabaseTransactions;

    /** @var \App\Models\User */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function can_authenticate()
    {
        $this->postJson('/api/login', [
            'email' => $this->user->email,
            'password' => 'secret',
        ])
        ->assertSuccessful()
        ->assertJsonStructure(['token'])
        ->assertJson(['token_type' => 'bearer']);
    }

    /** @test */
    public function can_fetch_the_current_user()
    {
        /*$response = $this->actingAs($this->user)
            ->getJson('/api/user');

        dd($response->content());*/
            /*->assertSuccessful()
            ->assertJsonStructure(['email']);*/
    }

    /** @test */
    public function can_log_out()
    {
        /*$token = $this->postJson('/api/login', [
            'email' => $this->user->email,
            'password' => 'secret',
        ])->json()['token'];

        dd($this->json('POST', "/api/logout")->content());*/
        //dd($this->json('POST', "/api/logout?token=$token")->content());
            //->assertSuccessful();

        /*$this->getJson("/api/user?token=$token")
            ->assertStatus(401);*/
    }
}
