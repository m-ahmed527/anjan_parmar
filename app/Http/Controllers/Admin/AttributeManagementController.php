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

    // public function update(UpdateAttributeRequest $request, Attribute $attribute)
    // {
    //     dd($request->all());
    //     // Validate that variants are not empty
    //     if (!$request->filled('values') || empty(array_filter($request->values))) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Values cannot be null',
    //         ]);
    //     }

    //     try {
    //         DB::beginTransaction();
    //         // Update attribute name
    //         $attribute->update($request->sanitized());
    //         // Sync Variants
    //         $newValues = collect($request->values)->filter()->unique()->values();
    //         // dd($newValues, $attribute->values);
    //         // Remove existing variants that are not in the new list
    //         $attribute->values()->whereNotIn('value', $newValues)->delete();

    //         // Add new variants
    //         foreach ($newValues as $value) {
    //             $attribute->values()->updateOrCreate(
    //                 ['value' => $value],
    //                 [
    //                     'value' => $value,
    //                 ]
    //             );
    //         }

    //         DB::commit();
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Attributes updated successfully',
    //         ]);
    //     } catch (Exception $e) {
    //         dd($e->getMessage());
    //         DB::rollBack();
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Failed to update Attributes',
    //         ]);
    //     }
    // }

    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        if (!$request->filled('values') || empty(array_filter($request->values))) {
            return response()->json([
                'success' => false,
                'message' => 'Values cannot be null',
            ]);
        }

        try {
            DB::beginTransaction();

            $attribute->update($request->sanitized());

            // Jo variants pehle se mojood hain
            $existingValues = $attribute->values()->pluck('value', 'id')->toArray();

            // Request se values aur IDs le lo
            $inputValues = $request->values;
            $inputIds = $request->ids;

            // Update or Create Logic
            foreach ($inputValues as $key => $value) {
                $id = $inputIds[$key] ?? null;
                if ($id && isset($existingValues[$id])) {
                    // Agar ID mojood hai, toh update karein
                    $attribute->values()->where('id', $id)->update(['value' => $value]);
                } else {
                    // Agar koi ID nahi hai, toh naya insert karein
                    $attribute->values()->create(['value' => $value]);
                }
            }

            // Handle Deleted Values
            if ($request->has('deleted_values')) {
                $deletedValues = json_decode($request->deleted_values, true);
                $attribute->values()->whereIn('id', $deletedValues)->delete();
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Attributes updated successfully',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            if (str_contains($e->getMessage(), '1451')) {
                return response()->json([
                    'success' => false,
                    'message' => 'The Values you deleted related with some products.',
                ], 400);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update Attributes',
                ], 400);
            }
        }
    }



    public function delete(Attribute $attribute)
    {
        try {
            // dd($attribute);
            DB::beginTransaction();
            $attribute->values()->delete();
            $attribute->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Attribute and its variants deleted successfully',
            ]);
        } catch (\Exception $e) {
            // dd(str_contains($e->getMessage(), '1451'));
            DB::rollBack();
            if (str_contains($e->getMessage(), '1451')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot delete attribute. It has related products or categories.',
                ], 400);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to delete attribute',
                ], 400);
            }
        }
    }
}
