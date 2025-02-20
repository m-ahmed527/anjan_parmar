<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Variant;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductManagementController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('screens.admin.product-management.index', get_defined_vars());
    }

    protected function keyValues($products): Collection
    {
        return $products->map(function ($product) {
            return [
                'ID' => $product->id,
                'Image' => '',
                'Name' => $product->name ?? '--',
                'Price' => $product->price ?? '--',
                'Status' =>  $product->is_active == '1' ? 'active' : 'inactive',
            ];
        });
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('screens.admin.product-management.create', get_defined_vars());
    }

    public function store(StoreProductRequest $request)
    {
        try {

            DB::beginTransaction();
            $data = $request->all();
            $product = Product::create($request->sanitized());
            $product->addMedia($request->featured_image, 'featured_image');
            if ($request->has('images')) {
                $product->addMultipleMedia($request->images, 'multiple_images');
            }
            if (isset($data["attributes"])) {
                $variants = $this->prepareVariants($data);
                foreach ($variants as $variant) {
                    $product->variants()->create($variant);
                }
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
    private function prepareVariants($data)
    {
        $structuredArray = [];

        // Extract attribute keys dynamically
        $attributeKeys = array_keys($data["attributes"]);

        // Find total variants count (based on first attribute's count)
        $totalVariants = count(reset($data["attributes"]));

        for ($i = 0; $i < $totalVariants; $i++) {
            $variantData = [];

            // Add all attributes dynamically
            foreach ($attributeKeys as $key) {
                if (isset($data["attributes"][$key][$i])) {
                    $variantData[$key] = $data["attributes"][$key][$i];
                }
            }

            // Construct final structured array
            $structuredArray[] = [
                "attributes" => json_encode($variantData),
                "variant_price" => isset($data["variant_price"][$i]) ? (int) $data["variant_price"][$i] : 0,
                "quantity" => isset($data["quantity"][$i]) ? (int) $data["quantity"][$i] : 0
            ];
        }
        return $structuredArray;
    }

    public function show(Product $product): View
    {
        $var = json_decode($product->variants[0]->attributes, true);

        return view('screens.admin.product-management.details', get_defined_vars());
    }

    public function delete(Product $product)
    {
        $product->delete();
        toastr()->info('Product deleted successfully !');
        return back();
    }

    public function edit(Product $product): View
    {
        $product->load('variants');
        $categories = Category::pluck('name', 'id');
        $attributes = Attribute::with('variants')->get();
        $variants = Variant::all();
        $brands = Brand::all();
        return view('screens.admin.product-management.edit', compact('product', 'categories', 'attributes', 'variants', 'brands'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->sanitized());
        if ($request->hasFile('images')) {
            $product->clearMediaCollection('product-images');

            $mediaItems = $product->addMultipleMediaFromRequest(['images']);

            foreach ($mediaItems as $media) {
                $media->toMediaCollection('product-images');
            }
        }
        if ($request->hasFile('featured_image')) {
            $product->clearMediaCollection('product-featured-image');
            $product->addMedia($request->featured_image)->toMediaCollection('product-featured-image');
        }
        $product->categories()->sync($request->category);

        // Sync variants
        $product->variants()->sync($request->sanitizedVariants());

        // Sync attributes
        $product->attributes()->sync($request->sanitizedAttributes());
        toastr()->success('product updated successfully..!');
        return redirect()->route('admin.product.index');
    }

    public function getVariants($attribute)
    {
        $attribute = Attribute::where('id', $attribute)->first();
        $variants = $attribute->variants()->get();
        return response()->json([
            'variants' => $variants,
            'status' => 200,
        ]);
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
                'variants' => $attribute->variants->map(function ($variant) {
                    return [
                        'id' => $variant->id,
                        'attribute_id' => $variant->attribute_id,
                        'slug' => $variant->slug,
                        'name' => $variant->name,
                    ];
                }),
            ];
        });
        $html = view('includes.admin.product.fetch-attributes-variants', get_defined_vars())->render();
        return response()->json(['success' => true, 'html' => $html]);
    }
    public function changeStatus(Product $product)
    {

        try {
            $product->update([
                'is_active' => request()->is_active == 1 ? 0 : 1,
            ]);

            return response()->json([
                'status' => $product->is_active,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
    // public function selectedVariants($attribute)
    // {
    //     $attribute = Attribute::where('id', $attribute)->first();
    //     $variants = $attribute->variants()->get();

    //     return response()->json([
    //         'variants' => $variants,
    //     ]);
    // }


}
