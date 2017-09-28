<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
