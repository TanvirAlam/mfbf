<?php

namespace Tests;

use App\Models\User;
use Tymon\JWTAuth\Contracts\JWTSubject;

trait CallsApi
{
    public function authenticate(JWTSubject $user = null)
    {
        \JWTAuth::setToken(\JWTAuth::fromSubject($user ?: factory(User::class)->create()));
    }
}
