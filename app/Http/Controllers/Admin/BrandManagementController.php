<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BrandManagementController extends Controller
{
    public function index(): View
    {
        $brands = Brand::all();
        return view('screens.admin.brand-management.index',compact('brands'));
    }

    public function create(): View
    {
        return view('screens.admin.brand-management.create');
    }
    public function store(StoreBrandRequest $request)
    {
        if ($request->sanitized()) {
            $brand = Brand::create($request->sanitized());
            if ($request->sanitizedImage() != false) {
                $brand->addMedia($request->sanitizedImage())->toMediaCollection('brand-image');
            }
            toastr()->success('Brand added successfully..!');
            return redirect()->route('admin.brand.index');
        }
        toastr()->error('Oops!  Brand not added , something went wrong.');
        return back();
    }

    public function show(Brand $brand) : View {
        return view('screens.admin.brand-management.details',compact('brand'));
    }

    public function edit(Brand $brand) : View {
        return view('screens.admin.brand-management.edit',compact('brand'));
    }

    public function update(Request $request, Brand $brand) {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'sometimes|image'
        ]);
        if($validated)
        {

            if($request->hasFile('image'))
            {
                $brand->addMedia($request->image)->toMediaCollection('brand-image');
            }
            $brand->update([
                'slug' => \Str::slug($request->name),
                'name' => $request->name,
            ]);
            toastr()->success($brand->name . ' updated successfully..!');
            return redirect()->route('admin.brand.index');
        }
        toastr()->error($brand->name . ' updation failed !!. Something went wrong, please try again');
        return back();
    }

    public function changeStatus(Brand $brand)
    {
        try {
            $brand->update([
                'status' => request()->status == 'active' ? 'inactive' : 'active',
            ]);
            return response()->json([
                'status' => $brand->status,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete(Brand $brand) {
        $brand->delete();
        toastr()->success('Brand deleted Successfully !');
        return back();
    }
}
