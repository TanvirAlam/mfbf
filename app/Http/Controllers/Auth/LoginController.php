<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $findUser = User::where('email', $user->email)->first();

        if ($findUser) {
            Auth::login($findUser);
            return 'Loged in with old user';

        } else {
            Auth::login($this->createNewUser($user));
            return 'Loged in new user';
        }
    }

    /**
     *Create a new user
     *
     * @param User $user
     */
    public function createNewUser($user)
    {
        $users = new User();
        $users->username = $user->getName();
        $users->email = $user->getEmail();
        $users->password = bcrypt(123456);
        $users->provider = $user->getName();
        $users->provider_id = $user->getId();

        $users->save();
    }
}
