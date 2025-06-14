<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RejectSessionAuthForApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si hay un usuario autenticado por sesión y la solicitud usa Sanctum, bloquear
        if (Auth::check() && !$request->bearerToken()) {
            return response()->json(['error' => 'No autorizado'], 401);
        }

        return $next($request);
    }
}
