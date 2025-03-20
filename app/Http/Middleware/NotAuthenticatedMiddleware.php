<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotAuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!auth()->check()) {
    //         return redirect()->route('index')->with('not_logged_in', 'You must be logged in to view this page.');
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You must be logged in to view this page.'
                ], 401);
            }
            return redirect()->route('index')->with('not_logged_in', 'You must be logged in to view this page.');
        }

        return $next($request);
    }
}
