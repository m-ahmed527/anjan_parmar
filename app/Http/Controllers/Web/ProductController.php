<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // dd($products[0]->category);
        return view('screens.web.products.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();
    //     // Extract unique attribute keys dynamically
    //     $attributeKeys = collect();
    //     $variants = $product->variants->map(function ($variant) use ($attributeKeys) {
    //         $decodedAttributes = json_decode($variant->attributes, true);
    //         $attributeKeys->push(array_keys($decodedAttributes)); // Collect all attribute keys

    //         return [
    //             'id' => $variant->id,
    //             'attributes' => $decodedAttributes,
    //             'price' => $variant->variant_price,
    //         ];
    //     });

    //     // Remove duplicate attribute keys
    //     $attributeKeys = $attributeKeys->flatten()->unique()->values();
    //     // dd($attributeKeys, $variants);
    //     return view('screens.web.products.show', get_defined_vars());
    // }


    public function show($product)
    {
        $product = Product::with(['variants.attributeValues.attribute'])->findOrFail($product);
        // dd($product->variants[0]->attributeValues[0]->attribute);
        return view('screens.web.products.show', compact('product'));
    }
    // public function getVariantPrice(Request $request)
    // {
    //     $attributeValueIds = $request->input('attribute_values');
    //     $variant = Variant::whereHas('attributeValues', function ($query) use ($attributeValueIds) {
    //         $query->whereIn('attribute_value_id', $attributeValueIds);
    //     }, '=', count($attributeValueIds))->first();
    //     // dd($variant,$request->all());

    //     return response()->json(['price' => $variant ? $variant->price : null]);
    // }


    public function getVariantPrice(Request $request)
    {
        $attributeValueIds = $request->input('attribute_values', []);
        // dd($request->all(), $attributeValueIds);
        // Ensure it's an array
        if (!is_array($attributeValueIds) || empty($attributeValueIds)) {
            return response()->json(['price' => null, 'error' => 'No attribute values provided.']);
        }

        $variant = Variant::whereHas('attributeValues', function ($query) use ($attributeValueIds) {
            $query->whereIn('attribute_value_id', $attributeValueIds);
        }, '=', count($attributeValueIds))->first();

        return response()->json(['price' => $variant ? $variant->price : null]);
    }
}
