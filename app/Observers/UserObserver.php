<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\User\VerificationRequired;

class UserObserver
{
    public function created(User $user)
    {
        $user->notify(new VerificationRequired);
    }
}
