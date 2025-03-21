<?php

namespace App\Filters;

use Closure;

class BlogFilter
{
    /**
     * Create a new class instance.
     */
    public function handle($query, Closure $next)
    {
        if (request()->has('term') && request()->get('term') != null) {
            $query->where('name', 'like', '%' . request()->term . '%')->orWhere('short_description', 'like', '%' . request()->term . '%');
        } else {
            return $next($query);
        }
        return $next($query);
    }
}
