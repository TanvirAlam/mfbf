<?php

namespace App\Http\Middleware;

use App\Transformers\UserTransformer;
use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class VerifyJWTToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::toUser($request->input('token'));
        } catch (TokenExpiredException | TokenInvalidException | JWTException $e) {
            return response()->json(['error'], $e->getStatusCode());
        }

        // the token is valid and we have found the user via the sub claim
        return fractal($user, new UserTransformer)->respond();
    }
}
