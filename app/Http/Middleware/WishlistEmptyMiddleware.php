<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WishlistEmptyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (auth()->check()) {
    //         if (auth()?->user()?->wishlist->count() == 0) {
    //             return redirect()->back()->with('empty_wishlist', 'Your wishlists is Empty. Add some items to start!');
    //         }
    //         // return redirect()->back()->with('empty_wishlist', 'Your wishlist is Empty.!');
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()?->wishlist()->count() == 0) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Your wishlist is empty.'
                ], 403);
            }
            return redirect()->route('index')->with('error', 'Your wishlist is empty.');
        }

        return $next($request);
    }
}
