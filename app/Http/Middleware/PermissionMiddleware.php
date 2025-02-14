<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $permission)
    {
        // dd($permission);
        if (!$request->user() || !auth()->user()->hasPermission($permission)) {
            abort(403, 'Unauthorized Access , you don\'t have right permission.');
        }

        return $next($request);
    }
}
