<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VariantManagementController extends Controller
{
    public function index(): View
    {
        $variants = Variant::all();
        return view('screens.admin.variant-management.index',compact('variants'));
    }

    public function create(): View
    {
        return view('screens.admin.variant-management.create');
    }

    public function store(StoreAttributeRequest $request)
    {
        // Attribute::create($request->sanitized());
        // toastr()->success('Attribute created successfully !');
        // return redirect()->route('admin.attribute.index');
    }

    public function edit(Attribute $attribute) : View {
        return view('screens.admin.variant-management.edit',compact('attribute'));
    }

    public function update(UpdateAttributeRequest $request, Attribute $attribute)  {
        // $attribute->update($request->sanitized());
        // toastr()->success('Attribute updated successfully !');
        // return redirect()->route('admin.attribute.index');
    }

    public function delete(Variant $variant)  {
        $variant->delete();
        toastr()->success('Attribute deleted successfully !');
        return back();
    }
}
