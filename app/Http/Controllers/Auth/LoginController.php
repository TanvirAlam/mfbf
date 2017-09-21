<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
//use JWTAuth;

class LoginController extends Controller
{
    //use AuthenticatesUsers;

    /**
     * Attempt to log the user into the application
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function login(Request $request)
    {
        dd('sfdf');
        /*$token = $this->guard()->attempt($this->credentials($request), $request->get('token'));

        return response()
            ->json([
                'authenticated' => $token
            ]);*/
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

        // grab credentials from the request
        /*$credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));*/

    }


    /**
     * Log the user out of the application
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        JWTAuth::invalidate();
    }

    public function getUserInformation()
    {
        return response()
            ->json([
                'user' => Auth::user()
            ]);
    }
}
