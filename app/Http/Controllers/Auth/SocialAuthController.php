<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Services\SocialAccountService;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use JWTAuth;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the social provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    /**
     * Obtain the user information from social provider.
     *
     * @param SocialAccountService $service
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service)
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
        } catch (Exception $e) {
            return redirect()->route('root');
        }

        $authUser = $service->createOrGetUser($user);

        $token = JWTAuth::fromUser($authUser);

        return redirect('/#/AuthSocialiteUser');

    }

    public function authenticateUser()
    {
        /**
         * If there is a user already logged in, then we shouldn't
         * login him out!
         */
        if (auth()->check()) {
            return response()->json([
                'status'  => false,
                'message' => 'User already logged in'
            ]);
        }

        $id = request('id');

        $user = User::where('provider_user_id', $id)->first();

        if (count($user) && auth()->loginUsingId($user->id)) {
            return response()->json([
                'status' => true,
                'user'   => $user
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }
}
