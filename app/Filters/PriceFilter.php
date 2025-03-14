<?php


namespace App\Filters;

use App\Models\Category;
use App\Models\Product;
use Closure;

use function PHPUnit\Framework\isEmpty;

class PriceFilter
{

    public function handle($query, Closure $next)
    {

        // // Apply price range filter
        if (request()->has('min_price') && request()->has('max_price')) {
            $query->whereBetween('price', [floatval(request('min_price')), floatval(request('max_price'))]);
        } else {
            return $next($query);
        }


        return $next($query);
    }
}
