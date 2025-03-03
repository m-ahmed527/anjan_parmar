<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\AttributeValue;
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
        $products = Product::where('is_premium', 0)->get();
        return view('screens.admin.product-management.index', get_defined_vars());
    }
    public function premiumIndex(): View
    {
        $products = Product::where('is_premium', 1)->get();
        return view('screens.admin.product-management.premium', get_defined_vars());
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


            // $product->variants()->create(['sku' => $product->slug . '-', 'price' => $product->price, 'quantity' => $product->quantity]);
            // $variant1 = Variant::create(['product_id' => $product->id, 'sku' => 'TSHIRT-S-RED', 'price' => 500.00, 'quantity' => 10]);
            // $variant1->attributeValues()->attach([$sizeS->id, $colorRed->id]);

            if (isset($data["attributes"])) {
                $variants = $this->prepareVariants($data, $product);
                // foreach ($variants as $variant) {
                //     $var = $product->variants()->create($variant);
                //     $var->attributeValues()->attach($var->id);
                // }
            }

            // if (!empty($data["attributes"])) {
            //     $filteredAttributes = array_filter($data["attributes"], function ($attrValues) {
            //         return !empty(array_filter($attrValues)); // Remove null values
            //     });
            // }

            // $filteredPrices = array_filter($data["variant_price"], function ($price) {
            //     return !is_null($price);
            // });

            // $filteredQuantities = array_filter($data["quantity"], function ($qty) {
            //     return !is_null($qty);
            // });


            // // If all attributes, prices, and quantities are empty, do not process variants
            // if (!empty($filteredAttributes) || !empty($filteredPrices) || !empty($filteredQuantities)) {
            //     $variants = $this->prepareVariants($data);
            //     foreach ($variants as $variant) {
            //         $product->variants()->create($variant);
            //     }
            // }
            // dd($data, $filteredAttributes, $filteredPrices, $filteredQuantities);
            DB::commit();
            return response([
                "success" => true,
                "message" => "Product created successfully",
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
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







    public function show(Product $product): View
    {


        return view('screens.admin.product-management.details', get_defined_vars());
    }



    public function edit(Product $product): View
    {
        $categories = Category::all();
        $variants = Variant::where('product_id', $product->id)->get();
        $attributes = $this->getAttribute($product->category);
        return view('screens.admin.product-management.edit', get_defined_vars());
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {

            DB::beginTransaction();
            $data = $request->all();

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
                // foreach ($product->variants as $variant) {
                //     $product->variants()->delete();
                // }
                // foreach ($variants as $variant) {
                //     $product->variants()->create($variant);
                // }
            }
            // dd($variants, $request->sanitized());
            DB::commit();
            return response([
                "success" => true,
                "message" => "Product updated successfully",
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return response([
                "success" => false,
                "message" => "Failed to update product. Please try again.",
            ]);
        }
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
        // dd($attributes);
        if (request()->ajax()) {
            $html = view('includes.admin.product.fetch-attributes-variants', get_defined_vars())->render();
            return response()->json(['success' => true, 'html' => $html]);
        } else {
            return $attributes;
        }
    }


    public function delete(Product $product)
    {
        try {
            DB::beginTransaction();
            // $product->clearMediaCollection('featured_image');
            // $product->clearMediaCollection('multiple_images');
            $product->delete();
            DB::commit();
            return response()->json([
                "message" => "Product deleted successfully.",
                'success' => true,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return response()->json([
                "message" => "Failed to delete product.",
                'success' => false,
            ]);
        }
    }

    public function makePremium(Request $request)
    {
        try {
            DB::beginTransaction();
            $products = Product::whereIn('slug', $request->slugs)->get();
            foreach ($products as $product) {
                $product->update([
                    'is_premium' => 1,
                ]);
            };
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Products made premium successfully.',
            ]);
        } catch (Exception $e) {
            return response([
                "success" => false,
                "message" => "Failed to make premium. Please try again.",
            ]);
        }
    }
    public function removePremium(Request $request)
    {
        try {
            DB::beginTransaction();
            $products = Product::whereIn('slug', $request->slugs)->get();
            foreach ($products as $product) {
                $product->update([
                    'is_premium' => 0,
                ]);
            };
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Products removed from premium successfully.',
            ]);
        } catch (Exception $e) {
            return response([
                "success" => false,
                "message" => "Failed to remove from premium. Please try again.",
            ]);
        }
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
}
// private function prepareVariants($data)
    // {
    //     $structuredArray = [];

    //     // Extract attribute keys dynamically
    //     $attributeKeys = array_keys($data["attributes"]);

    //     // Find total variants count (based on first attribute's count)
    //     $totalVariants = count(reset($data["attributes"]));

    //     for ($i = 0; $i < $totalVariants; $i++) {
    //         $variantData = [];

    //         // Add all attributes dynamically
    //         foreach ($attributeKeys as $key) {
    //             if (isset($data["attributes"][$key][$i])) {
    //                 $variantData[$key] = $data["attributes"][$key][$i];
    //             }
    //         }

    //         // Construct final structured array
    //         $structuredArray[] = [
    //             "attributes" => json_encode($variantData),
    //             "variant_price" => isset($data["variant_price"][$i]) ? (float) $data["variant_price"][$i] : null,
    //             "quantity" => isset($data["quantity"][$i]) ? (int) $data["quantity"][$i] : null
    //         ];
    //     }
    //     return $structuredArray;
    // }
