<?php

namespace App\Http\Controllers\Web;

use App\Filters\BlogFilter;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Fetch latest blog posts from the database
        $blogs = Blog::paginate(3);
        $recentBlogs = Blog::latest()->filter([
            BlogFilter::class,
        ])->get()->take(5);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('screens.web.blogs.list', get_defined_vars())->render(),
                'recent_blogs' => view('screens.web.blogs.recent-list', get_defined_vars())->render(),
            ]);
        }
        return view('screens.web.blogs.index', get_defined_vars());
    }

    public function show(Blog $blog, Request $request)
    {
        $recentBlogs = Blog::latest()->filter([
            BlogFilter::class,
        ])->get()->take(5);
        if ($request->ajax()) {
            return response()->json([
                'recent_blogs' => view('screens.web.blogs.recent-list', get_defined_vars())->render(),
            ]);
        }
        return view('screens.web.blogs.show', get_defined_vars());
    }
}
