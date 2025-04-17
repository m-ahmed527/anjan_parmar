<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = auth()->user()->products;
        return view('screens.vendor-store.product-management.index', get_defined_vars());
    }
    public function getProductsData()
    {
        $products = auth()->user()->products;
        $products->map(function ($product) {
            $product->discounted_price = $product->discount();
            $product->image = $product->getFirstMediaUrl('featured_image');
            $product->search_key = $product->slug . $product->name . $product->price . $product->discounted_price . $product->discount_type;
        });
        return DataTables::of($products)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = auth()->user()->categories;
        return view('screens.vendor-store.product-management.create', get_defined_vars());
    }
    public function getAttribute(Category $category)
    {
        $attributes = $category->attributes->map(function ($attribute) {
            return [
                'attribute' => [
                    'id' => $attribute->id,
                    'slug' => $attribute->slug,
                    'name' => $attribute->name,
                ],
                'values' => $attribute->values->map(function ($value) {
                    return [
                        'id' => $value->id,
                        'attribute_id' => $value->attribute_id,
                        'value' => $value->value,
                    ];
                }),
            ];
        });
        if (request()->ajax()) {
            $html = view('includes.vendor-store.product.fetch-attributes-variants', get_defined_vars())->render();
            return response()->json(['success' => true, 'html' => $html]);
        } else {
            return $attributes;
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {

            DB::beginTransaction();
            $data = $request->all();
            // dd($request->sanitized());
            $product = auth()->user()->products()->create($request->sanitized());
            $product->addMedia($request->featured_image, 'featured_image');
            if ($request->has('images')) {
                $product->addMultipleMedia($request->images, 'multiple_images');
            }

            if (isset($data["attributes"])) {
                $variants = $this->prepareVariants($data, $product);
            }
            DB::commit();
            return response([
                "success" => true,
                "message" => "Product created successfully",
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response([
                "success" => false,
                "message" => "Failed to create product. Please try again.",
            ]);
        }
    }

    private function prepareVariants($data, $product)
    {
        $product->variants()->delete();
        $structuredArray = [];

        // Extract attribute keys dynamically
        $attributeKeys = array_keys($data["attributes"]);

        // Find total variants count (based on first attribute's count)
        $totalVariants = count(reset($data["attributes"]));

        for ($i = 0; $i < $totalVariants; $i++) {
            $variantData = [];

            // Add all attributes dynamically
            foreach ($attributeKeys as $key) {
                if (!empty($data["attributes"][$key][$i])) { // Ignore null or empty values
                    $variantData[] = $data["attributes"][$key][$i];
                }
            }

            // Check if the variant has valid data (No all-null variants)
            $variantPrice = isset($data["variant_price"][$i]) ? (float) $data["variant_price"][$i] : null;
            $quantity = isset($data["quantity"][$i]) ? (int) $data["quantity"][$i] : null;

            // Skip variants if all values are null/empty
            if (!empty($variantData) || !is_null($variantPrice) || !is_null($quantity)) {
                $structuredArray[] = [
                    "sku" => \Str::slug($data['name']) . '-' . ($variantPrice ?? 0),
                    "price" => $variantPrice ?? 0,
                    "quantity" => $quantity ?? null
                ];

                $var = $product->variants()->create($structuredArray[$i]);
                $var->attributeValues()->sync($variantData);
            }
        }
        // dd($structuredArray,$variantData, $data);
        return $structuredArray;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return view('screens.vendor-store.product-management.details', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        $categories = auth()->user()->categories;
        $variants = Variant::where('product_id', $product->id)->get();
        $attributes = $this->getAttribute($product->category);
        // dd($variants);
        return view('screens.vendor-store.product-management.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {

            DB::beginTransaction();
            $data = $request->all();
            // dd($data);
            $product->update($request->sanitized());
            // $product->addMedia($request->featured_image, 'featured_image');
            if ($request->has('featured_image')) {
                $product->addMedia($request->featured_image, 'featured_image');
            }
            if ($request->has('images')) {
                $product->updateMediaMultiple($request->images, 'multiple_images');
            }


            if (isset($data["attributes"])) {
                $variants = $this->prepareVariants($data, $product);
            }
            // dd($variants, $request->sanitized());
            DB::commit();
            return response([
                "success" => true,
                "message" => "Product updated successfully",
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response([
                "success" => false,
                "message" => "Failed to update product. Please try again.",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // dd($product);
            DB::beginTransaction();

            $delete = $product->delete();
            // dd($delete);
            if ($delete) {
                $product->clearMediaCollection('featured_image');
                $product->clearMediaCollection('multiple_images');
            }
            DB::commit();
            return response()->json([
                "message" => "Product deleted successfully.",
                'success' => true,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "message" => "Failed to delete product.",
                'success' => false,
            ]);
        }
    }
}
