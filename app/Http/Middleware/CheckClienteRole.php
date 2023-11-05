<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClienteRole
{

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->permiso) {
            if (auth()->user()->permiso->nombre === 'Client') {
                return $next($request);
            }
        }

        abort(403, 'No tienes permiso para acceder a esta página.');
    }
}
