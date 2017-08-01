<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the login page
     *
     * @return View
     */
    public function showLoginPage()
    {
        return View::make('auth.login');
    }

    /**
     * Login as a user
     *
     * @return RedirectResponse | View
     */
    public function login()
    {

    }

    /**
     * Logout
     */
    public function logout() {
        Auth::logout();
        return Redirect::to('login');
    }
}
