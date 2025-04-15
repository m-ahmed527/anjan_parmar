<?php


namespace App\Filters;

use App\Models\Category;
use App\Models\Product;
use Closure;

use function PHPUnit\Framework\isEmpty;

class ProductFilter
{

    public function handle($query, Closure $next)
    {
        // dd(request()->all());
        // // Apply price range filter
        if (request()->has('product_name') && request()->get('product_name') != null) {
            $query->where('name', 'like', '%' . request()->product_name . '%');
        } else {
            // dd($query->get());
            return $next($query);
        }


        return $next($query);
    }
}
