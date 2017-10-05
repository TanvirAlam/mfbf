<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Attempt to log the user into the application
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users,email,verified_at,NOT_NULL',
            'password' => 'required|min:6',
        ];

        //Validate parameters
        $validator = $this->validate( $request , $rules);

        //Check if validation fails
        if (!$validator) {
            return response()->json(['error'=>$validator->errors()],Response::HTTP_BAD_REQUEST);
        }

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($request->only('email','password'))) {
                return response()->json(['error' => 'The email or password you entered is incorrect'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        return response()->json([
            'token' => $token,
            'status' => 'success',
            'token_type' => 'Bearer',
        ])->header('authorization', $token);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return response(['user' => auth()->user()->load('profile')], 200);
    }

    /**
     * GEt user information
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser(Request $request)
    {
        return response()->json(['user' => JWTAuth::toUser($request->token)]);
    }
}
