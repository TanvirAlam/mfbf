<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'email_verification', 'email_token'
    ];

    protected $observables = [
        'registered'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verification'
    ];

    public function register($email, $password)
    {
        $this->fill([
            'email' => $email,
            'password' => bcrypt($password),
            'email_token' => md5($email),
        ])->fireModelEvent('registered', false);

        $this->save();
        //Notification::send($this, new VerificationRequired());
        return $this;
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

    /* Relationships */

    /* Scopes */
    public function scopeVerified(Builder $query, $verified = true)
    {
        return $query->{sprintf('where%sNull', $verified ? 'Not' : '')}('verified_at');
    }
}
