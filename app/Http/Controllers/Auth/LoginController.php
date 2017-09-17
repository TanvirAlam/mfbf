<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Attempt to log the user into the application
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function login(Request $request)
    {
        $credentials   =  $request->only('email','password');

        //Validate parameters
        $validator = Validator::make($credentials, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        //Check if validation fails
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()],Response::HTTP_BAD_REQUEST);
        }
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'The email or password you entered is incorrect'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        return response()->json(compact('token'));
    }

    /**
     * GEt user information
     */
    public function getUser()
    {
        return JWTAuth::user();
    }
}
