<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->permiso) {
            if (auth()->user()->permiso->nombre === 'Admin') {
                return $next($request);
            }
        }

        abort(403, 'No tienes permiso para acceder a esta página.');
    }
}
