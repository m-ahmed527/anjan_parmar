<?php


namespace App\Filters;

use App\Models\Category;
use App\Models\Product;
use Closure;

use function PHPUnit\Framework\isEmpty;

class CategoryFilter
{

    public function handle($query, Closure $next)
    {


        // Apply category filter
        if (request()->has('category') && request()->get('category') != null) {
            $category = Category::whereSlug(request()->category)->first();
            $query->where('category_id', $category->id);
            // dd($query->get());
            return $next($query);
        } else {
            return $next($query);
        }
    }
}
