<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class BootstrapJwtMiddleware extends BaseMiddleware
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
            $user = JWTAuth::parseToken()->authenticate(); 
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return $this->respondWithError('Token is Invalid');
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return $this->respondWithError('Token is Expired');
            }else{
                return $next($request);
                //return $this->respondWithError('Authorization Token not found');  
            }
        }
        return $next($request);
    }

    public function respondWithError($message, $data= null)
    {
        return response()->json([
            "error" => [
                "message" => $message,
                "data" => $data,
            ]
            ], 401);
    }

}