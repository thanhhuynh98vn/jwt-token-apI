<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class CheckValidateTokenAdmin
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
        $payload = JWTAuth::parseToken()->getPayload();
        if ($payload['context']->role == 'admin') {
            return $next($request);
        }
        
        return response()->json(['status' => 'Authorization Admin not found']);
    }
}