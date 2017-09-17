<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Attempt to log the user into the application
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function attemptLogin(Request $request)
    {
        $token = $this->guard()->attempt($this->credentials($request), $request->get('token'));

        return response()
            ->json([
                'authenticated' => $token
            ]);
    }

    /**
     * Send the response after the user was authenticate
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $token = (string) $this->guard()->user()->getRememberToken();

        return [
            'user' => $this->guard()->user(),
            'token' => $token,
            'token_type' => 'bearer'
        ];
    }

    /**
     * Log the user out of the application
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
    }
}
