<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable implements CanResetPasswordContract, AuthenticatableUserContract
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'email_token',
        'verified_at',
    ];

    protected $dates = ['verified_at'];

    protected $observables = ['registered'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function register($email, $password)
    {
        $this->fill([
            'email' => $email,
            'password' => bcrypt($password),
            'email_token' => md5($email),
        ])->save();

        $this->fireModelEvent('registered', false);

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

    /**
     * Handle a verification request for the application
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function verify()
    {
        $this->verified_at = $this->freshTimestamp();
        $this->save();

        return $this;
    }

    /* Relationships */

    /* Scopes */
    public function scopeIsVerified(Builder $query, $verified = true)
    {
        return $query->{sprintf('where%sNull', $verified ? 'Not' : '')}('verified_at');
    }

    public function getJWTIdentifier()
    {
        return $this->id;
    }

    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id' => $this->id
             ]
        ];
    }
}
