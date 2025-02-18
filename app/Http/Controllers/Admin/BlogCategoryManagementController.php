<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\View\ViewFinderInterface;

class BlogCategoryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogCategories = BlogCategory::all();
        return view('screens.admin.blog-category-management.index',compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('screens.admin.blog-category-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required',
            'blog_category_image' => 'sometimes|image',
        ]);

        if($validated)
        {
            $blogCategory = BlogCategory::create([
                'slug' => \Str::slug($request->name),
                'name' => $request->name,
            ]);
            if($request->hasFile('blog_category_image')){
                $blogCategory->addMedia($request->blog_category_image)->toMediaCollection('blog_category_image');
            }
            toastr()->success($blogCategory->name . ' created successfully..!');
            return redirect()->route('admin.blog.category.index');
        }
        toastr()->error('Request Failed..! Try again later.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {
        return view('screens.admin.blog-category-management.details',compact('blogCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('screens.admin.blog-category-management.edit',compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated =  $request->validate([
            'name' => 'required',
            'blog_category_image' => 'sometimes|image',
        ]);
        if($validated){
            $blogCategory->update([
                'slug' => \Str::slug($request->name),
                'name' => $request->name,
            ]);
            if($request->hasFile('blog_category_image'))
            {
                $blogCategory->addMedia($request->blog_category_image)->toMediaCollection('blog_category_image');
            }
            toastr()->success($blogCategory->name . ' updated successfully..!');
            return redirect()->route('admin.blog.category.index');
        }
        toastr()->error('Request Failed..! Try again later.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        toastr()->success('BlogCategory deleted Successfully !');
        return back();
    }
}
