<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products1 = Product::where('is_premium', 1)->inRandomOrder()->take(100)->get();

        $products2 = Product::where('is_premium', 1)->inRandomOrder()->take(100)->get();

        $related1 = Product::inRandomOrder()->take(10)->get();

        $related2 = Product::inRandomOrder()->take(10)->get();
        $blogs = Blog::latest()->get()->take(3);
        // dd($products1, $products2);
        return view('screens.web.index', get_defined_vars());
    }
}
