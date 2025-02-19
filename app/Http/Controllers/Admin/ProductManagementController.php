<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

    public function store(Request $request)
    {
        dd($request->all());
        // dd($request->all());
        // $product = [];
        // foreach ($request->sanitized() as $key => $sanitized) {
        //     $product[] = Product::create($sanitized);

        //     if ($product[$key]) {

        //         if (isset($request->images[$key])) {
        //             $product[$key]->addMultipleMediaFromRequest(['images[' . $key . ']'])->each(function ($fileAdder) {
        //                 $fileAdder->toMediaCollection('product-images');
        //             });
        //         }

        //         $product[$key]->addMedia($request->featured_image[$key])->toMediaCollection('product-featured-image');
        //         foreach ($request->category[$key] as $cat) {
        //             $product[$key]->categories()->attach($cat);
        //         }

        //         foreach ($request->sanitizedVariants()[$key]['variant_id'] as $index => $variantId) {
        //             $addOnPrice = $request->sanitizedVariants()[$key]['add_on_price'][$index];
        //             $quantity = $request->sanitizedVariants()[$key]['quantity'][$index];
        //             $product[$key]->variants()->attach($variantId, [
        //                 'add_on_price' => $addOnPrice,
        //                 'quantity' => $quantity,
        //             ]);
        //         }

        //         foreach ($request->sanitizedAttributes()[$key] as $attribute) {

        //             $product[$key]->attributes()->attach($attribute);
        //         }
        //     }
        // }
        // return redirect()->route('admin.product.index');
    }

    public function show(Product $product): View
    {

        return view('screens.admin.product-management.details', compact('product'));
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
        $html = view('includes.admin.product.fetch-attributes-variants',get_defined_vars())->render();
        return response()->json(['success' => true,'html' => $html]);
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
