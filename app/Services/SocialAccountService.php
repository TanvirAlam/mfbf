<?php

namespace App\Services;

use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $user = User::whereEmail($providerUser->getEmail())->first();

        if (!$user) {
            $user = $user->register([
                'email' => $providerUser->getEmail(),
                'password' => 'facebook',
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook',
            ]);
            $user->save();
        }

        return $user;
    }
}
