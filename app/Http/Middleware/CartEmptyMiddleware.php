<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartEmptyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // session()->flush();
        // dd(session('cart'));
        if (session('cart') == null || count(session('cart.items')) == 0) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Your Cart is empty.'
                ], 403);
            }
            return redirect()->route('index')->with('error', 'Your Cart is empty.');
        }

        return $next($request);
    }
}
