<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class clientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {

        //Verifier qu'on a pas recu un token et qu'il n'est pas valide
        if(!$request->bearerToken() || !Auth::guard('sanctum')->check()){

            return response()->json([
                'status_message'=>'Token invalide ou utilisateur non connecté',
                'status_code'=>401,
                'data'=>null
            ],401);

        }
        return $next($request);
    }
}
