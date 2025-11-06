<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user()->role !== $role) {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return $next($request);
    }
}

