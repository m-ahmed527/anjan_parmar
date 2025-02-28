<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Agar user authenticate nahi hai to different login pages per redirect karein
            if (str_contains($request->url(), 'admin')) {
                return redirect()->route('admin.login');
            }

            return redirect()->route('login'); // Default user login
        }

        return $next($request);
    }
}
