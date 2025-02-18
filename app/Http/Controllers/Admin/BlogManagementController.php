<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return view('screens.admin.blog-management.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = BlogCategory::all();
        return view('screens.admin.blog-management.create',compact('blogCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        if($request->sanitized())
        {
            $blog = Blog::create($request->sanitized());
            if($request->hasFile('featured_image'))
            {
                $blog->addMedia($request->featured_image)->toMediaCollection('blog-featured-image');
            }
            toastr()->success('Blog uploaded successfully ..!');
            return redirect()->route('admin.blog.index');
        }
        toastr()->error('Blog upload failed ..!. something went wrong , please try again later.');
        return back();

    }

    public function uploadContentImage(Request $request) {
        $imageName = $request->upload->HashName();
        $request->upload->move(public_path('/images'),$imageName);
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('images/'.$imageName);
        $res = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url')</script>";
        @header("Content-Type : text-html; charset=utf-8");
        echo $res;
    }
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('screens.admin.blog-management.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blogCategories = BlogCategory::all();
        return view('screens.admin.blog-management.edit',compact('blog','blogCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if($request->sanitized())
        {
            $blog->update($request->sanitized());
            if($request->hasFile('featured_image'))
            {
                $blog->addMedia($request->featured_image)->toMediaCollection('blog-featured-image');
            }
            toastr()->success($blog->name . ' updated successfully ..!');
            return redirect()->route('admin.blog.index');
        }
        toastr()->success($blog->name . ' updation failed ..!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        toastr()->success('Blog deleted Successfully !');
        return back();
    }
}
