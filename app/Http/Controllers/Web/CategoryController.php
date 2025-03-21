<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page ?? 1;
        $categories = Category::paginate(5, ['*'], 'page', $page);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('screens.web.categories.list', get_defined_vars())->render(),
                'lastPage' => $categories->lastPage(),
                'currentPage' => $categories->currentPage(),
                'total' => $categories->total()
            ]);
        }
        return view('screens.web.categories.index', get_defined_vars());
    }
}
