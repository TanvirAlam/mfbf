<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param \App\Models\User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'    => $user->id,
            'email' => $user->email,
            'password' => $user->password,
            'email_token' => $user->email_token,
        ];
    }
}
