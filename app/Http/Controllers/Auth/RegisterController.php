<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return (new User)->register($data['email'], $data['password']);
    }

    /**
     * Handle a registration request for the application
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        return response()->json(['email' => $this->create($request->all())->email]);
    }

    /**
     * Handle a verification request for the application
     *
     * @param $token
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($token)
    {
        $user = User::where('email_token', $token)->exists();
        $user->verified = true;
        if ($user->save()) {
            return response()->json(['email' => $user->email]);
        }
    }

    /**
     * Check email exist before register
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function checkEmail(Request $request)
    {
        if(!User::where('email', $request->get('email'))->exists()) {
            return response()->json(true);
        }
        return response()->json(false);
    }
}
