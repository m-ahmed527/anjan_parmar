<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryTypeManegementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryTypes = CategoryType::all();
        return view('screens.admin.category-type-management.index', compact('categoryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('screens.admin.category-type-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        if ($validated) {
            $categoryType = CategoryType::create([
                'slug' => Str::slug($request->name),
                'name' => $request->name,
            ]);
            if ($categoryType) {
                // toastr()->success('CategoryType created successfully..!');
                return redirect()->route('admin.category.type.index');
            }
            // toastr()->error('Opps ! something went wrong , try again');
            return back();
        }
        // toastr()->error('Opps ! something went wrong , try again');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryType $categoryType)
    {
        return view('screens.admin.category-type-management.edit', compact('categoryType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryType $categoryType)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        if ($validated) {
            $categoryType->update([
                'slug' => \Str::slug($request->name),
                'name' => $request->name,
            ]);
            if ($categoryType) {
                toastr()->success('CategoryType updated successfully..!');
                return redirect()->route('admin.category.type.index');
            }
            toastr()->error('Opps ! something went wrong , try again');
            return back();
        }
        toastr()->error('Opps ! something went wrong , try again');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(CategoryType $categoryType)
    {
        if ($categoryType) {
            $categoryType->delete();
            toastr()->success('CategoryType deleted successfully.!');
            return redirect()->route('admin.category.type.index');
        }
        toastr()->error('Something went wrong, try again .');
        return back();
    }
}
