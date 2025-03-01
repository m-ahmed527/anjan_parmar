<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleOrPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $roleOrPermission)
    {
        // dd($roleOrPermission);
        $user = Auth::user();

        // Split the role or permission by the `|` character
        $rolesOrPermissions = explode('|', $roleOrPermission);

        // Check if the user has any of the roles or permissions
        foreach ($rolesOrPermissions as $item) {
            if ($user->hasRole($item) || $user->hasPermission($item)) {
                // dd($item);
                return $next($request); // Grant access if any condition is met
            }
        }
        // dd(str_contains(url()->previous(),'login'));
        if(str_contains(url()->previous(),'login')){
            Auth::logout();
        }
        // If no matching role or permission is found, deny access
        abort(403, 'Unauthorized.You don\'t have access to this page');
    }
}
