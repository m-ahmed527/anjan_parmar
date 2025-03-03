<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAttributeRequest;
use App\Http\Requests\Admin\UpdateAttributeRequest;
use App\Models\Attribute;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributeManagementController extends Controller
{
    public function index(): View
    {
        $attributes = Attribute::all();
        return view('screens.admin.attribute-management.index', get_defined_vars());
    }

    public function show(Attribute $attribute)
    {

        return view('screens.admin.attribute-management.details', get_defined_vars());
    }
    public function create(): View
    {
        return view('screens.admin.attribute-management.create');
    }

    public function store(StoreAttributeRequest $request)
    {
        try {
            $attribute = Attribute::create($request->sanitized());
            foreach ($request->values as $value) {
                // dd($value);
                $attribute->values()->create([
                    // 'slug' => Str::slug($values),
                    'value' => $value,
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Attribute created successfully'

            ]);
        } catch (Exception $e) {
            // dd($e->getMessage());
            return response()->json([
                'error' => true,
                'message' => 'An error occurred while creating attribute'

            ]);
        }
    }

    public function edit(Attribute $attribute): View
    {
        return view('screens.admin.attribute-management.edit', get_defined_vars());
    }

    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        // Validate that variants are not empty
        if (!$request->filled('variants') || empty(array_filter($request->variants))) {
            return response()->json([
                'success' => false,
                'message' => 'Variants cannot be null',
            ]);
        }

        try {
            DB::beginTransaction();
            // Update attribute name
            $attribute->update($request->sanitized());
            // Sync Variants
            $newVariants = collect($request->variants)->filter()->unique()->values();
            // Remove existing variants that are not in the new list
            $attribute->variants()->whereNotIn('name', $newVariants)->delete();

            // Add new variants
            foreach ($newVariants as $variantName) {
                $attribute->variants()->updateOrCreate(
                    ['name' => $variantName],
                    [
                        'name' => $variantName,
                        'slug' => Str::slug($variantName)
                    ]
                );
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Attributes updated successfully',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Attributes',
            ]);
        }
    }



    public function delete(Attribute $attribute)
    {
        try {
            // dd($attribute);
            DB::beginTransaction();
            $attribute->variants()->delete();
            $attribute->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Attribute and its variants deleted successfully',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => 'Failed to delete attribute',
            ], 500);
        }
    }
}
