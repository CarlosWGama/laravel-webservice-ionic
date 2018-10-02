<?php

namespace App\Http\Middleware;

use Closure;
use \Firebase\JWT\JWT;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        try {
            $jwt = $request->header('Authorization');
            $usuario = JWT::decode($jwt, '123456', ['HS256']);
            if (empty($usuario))
                return response()->json("Acesso negado", 403);
        } catch(\Exception $e) {
            return response()->json("Acesso negado", 403);
        }
        return $next($request);
    }
}
