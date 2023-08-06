<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureRoleStudent
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->user()->hasRole(['student', 'admin'])) {
            return route('dashboard');
        }

        return $next($request);
    }
}
