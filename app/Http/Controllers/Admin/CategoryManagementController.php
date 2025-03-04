<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryType;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryManagementController extends Controller
{

    public function index(): View
    {
        $categories = Category::all();
        // dd($categories[0]->attributes()->withTrashed()->get());

        return view('screens.admin.category-management.index', get_defined_vars());
    }

    public function create(): View
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        // dd($attributes);
        return view('screens.admin.category-management.create', get_defined_vars());
    }

    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $category = Category::create($request->sanitized());
            $category->attributes()->sync($request->attribute);
            if ($request->image) {

                $category->addMedia($request->image, 'category');
            }
            if ($request->banner_image) {
                $category->addMedia($request->banner_image, 'category_banner');
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Category created successfully!',
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to create category',
            ], 400);
        }
    }

    public function edit(Category $category): View
    {
        $attributes = Attribute::all();
        return view('screens.admin.category-management.edit', get_defined_vars());
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {

            DB::beginTransaction();
            if ($request->image) {

                $category->addMedia($request->image, 'category');
            }
            if ($request->banner_image) {
                $category->addMedia($request->banner_image, 'category_banner');
            }
            $category->update($request->sanitized());
            $category->attributes()->sync($request->attribute);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully!',
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update category',
            ], 400);
        }
    }
    public function delete(Category $category)
    {
        try {
            DB::beginTransaction();
            $category->delete();
            $category->clearMediaCollection('category');
            $category->clearMediaCollection('category_banner');
            DB::commit();
            return response()->json([
                "message" => "Category deleted successfully.",
                'success' => true,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            if (str_contains($e->getMessage(), '1451')) {
                return response()->json([
                    "message" => "This category has related products or vendors. You cannot delete it.",
                    'success' => false,
                ], 400);
            } else {
                return response()->json([
                    "message" => "Failed to delete category.",
                    'success' => false,
                ], 400);
            }
        }
    }

    public function show(Category $category)
    {
        return view('screens.admin.category-management.details', compact('category'));
    }

    public function changeStatus(Category $category)
    {

        try {
            $category->update([
                'status' => request()->status == 'Active' ? 'Inactive' : 'Active',
            ]);
            return response()->json([
                'status' => $category->status,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
