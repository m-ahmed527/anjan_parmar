<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->store);
        // $products = Product::paginate(2);
        if ($request->has('store')) {
            $store = User::where('slug', $request->store)->first();
            $products = $store->products()->paginate(3)->appends(['store' => $request->store]);
        } else {
            $products = Product::whereHas('user', function ($query) {
                $query->where('status', 'approved');
            })->paginate(3);
        }

        // dd($products);
        if ($request->ajax()) {
            return response()->json([
                'html' => view('screens.web.products.list', get_defined_vars())->render()
            ]);
        }
        return view('screens.web.products.index', get_defined_vars());
    }




    public function fetchProducts(Request $request)
    {
        $products = Product::paginate(2);
        return view('screens.web.products.list', compact('products'))->render();
    }





    public function show($product)
    {
        $product = Product::with(['variants.attributeValues.attribute'])->where('slug', $product)->first();
        // $product = Product::with(['variants.attributes'])->where('slug', $product)->first();
        // dd($product->getValidCombinations());
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
        // dd($request->all());
        $attributeValueIds = $request->input('attribute_values', []);
        // dd($attributeValueIds);

        if (!is_array($attributeValueIds) || empty($attributeValueIds)) {
            return response()->json(['price' => null, 'error' => 'No attribute values provided.']);
        }
        $variant = Variant::where('product_id', $request->product_id)->whereHas('attributeValues', function ($query) use ($attributeValueIds) {
            $query->whereIn('attribute_value_id', $attributeValueIds);
        }, '=', count($attributeValueIds))->first();
        // dd($variant);
        $quantity = $variant ? $variant->quantity : null;
        return response()->json(['price' => $variant ? $variant->price : null, 'quantity' => $quantity]);
    }

    // public function getVariantPrice(Request $request, AttributeValue $attributeValue)
    // {

    //     $attribute_id = $request->storedAttributeID;
    //     // $combination =  $attributeValue->variants()->where('product_id', $request->product_id)->first()->attributeValues;
    //     $combination =  $attributeValue->variants()->where('product_id', $request->product_id)->get();
    //     // dd($combination );
    //     $combinations = [];
    //     foreach ($combination as $value) {
    //         foreach ($value->attributeValues as $attribute) {

    //             if ($attribute->attribute_id != $attribute_id) {
    //                 $combinations[] = $attribute->id;
    //             }
    //         }
    //     }
    //     // dd($combinations);

    //     return response()->json(['success' => true, 'attribute_id' => $attribute_id, 'combinations' => $combinations]);
    //     // $attributeValues = [];
    //     // foreach($attributeValue->variants as $attrValue){
    //     //     dd($attributeValue->variants);
    //     //     foreach($attrValue->attributeValues as $attVal){
    //     //         if($attributeValue->id != $attVal->id){
    //     //             $attributeValues[] = $attVal->id;
    //     //         }
    //     //     }
    //     // }
    //     // dd($attributeValues);

    // }

    // public function getVariantCombinations()
    // {
    //     $variants = Variant::with('attributeValues')->get();
    //     $combinations = [];

    //     foreach ($variants as $variant) {
    //         $combinations[] = $variant->attributeValues->pluck('id')->toArray();
    //     }

    //     return response()->json($combinations);
    // }
}
