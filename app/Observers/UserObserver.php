<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\User\VerificationRequired;

class UserObserver
{
    public function registered(User $user)
    {
        $user->notify(new VerificationRequired);
    }
}
