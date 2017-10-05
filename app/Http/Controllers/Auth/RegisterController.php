<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Flash;

class RegisterController extends Controller
{
    /**
     * Handle a registration request for the application
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        \request()->validate([
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        return response()->json([
            'email' => (new User)->register(
                $request->get('email'),
                $request->get('password')
            )
        ]);
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
        return response()->json(['exist' => User::where('email', $request->get('email'))->exists()]);
    }

    /**
     * Verify email address
     *
     * @param string $email_token
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function verifyEmail($email_token)
    {
        if (!$email_token) {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereEmailToken($email_token)->first();

        if (!$user) {
            throw new InvalidConfirmationCodeException;
        }

        $user->verify();

        Flash::message('You have successfully verified your account.');

        return redirect()->route('root')->with('key', 'You have done successfully');
    }
}
