<?php

namespace App\Http\Controllers\Web;

use App\Filters\CategoryFilter;
use App\Filters\PriceFilter;
use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreOfferRequest;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $categories = Category::all();

        $query = Product::whereHas('user', function ($q) {
            $q->where('status', 'approved');
        });

        // ✅ Check if store filter is applied
        if ($request->has('store') && $request->store) {
            $store = User::where('slug', $request->store)->first();
            if ($store) {
                $query = $store->products(); // Apply store filter
            }
        }

        // ✅ Apply Category & Price Filters
        $query = $query->filter([
            CategoryFilter::class,
            PriceFilter::class,
        ]);

        // ✅ Apply Pagination
        $products = $query->paginate(6)->appends($request->query());

        // ✅ Handle AJAX Response
        if ($request->ajax()) {
            return response()->json([
                'html' => view('screens.web.products.list', get_defined_vars())->render()
            ]);
        }

        return view('screens.web.products.index', get_defined_vars());
    }



    public function show($product)
    {
        $product = Product::with(['variants.attributeValues.attribute'])->where('slug', $product)->first();
        $relatedProducts = Product::where('category_id', $product->category_id)->get();
        return view('screens.web.products.show', get_defined_vars());
    }


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


    public function makeOffer(StoreOfferRequest $request, Product $product)
    {
        try {
            if (auth()->check()) {
                DB::beginTransaction();
                $product->offers()->create($request->sanitized());
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Offer sent successfully.'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'You must be logged in to make an offer.'
                ], 200);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while sending the offer.'
            ], 400);
        }
    }

    public function headerSearch(Request $request)
    {

        try {

            $products = Product::filter([
                CategoryFilter::class,
                ProductFilter::class,
            ])->get()->take(5);
            $products->map(function ($product) {
                $product->image = $product->getFirstMediaUrl('featured_image');
                $product->category = $product->category;
            });
            return response()->json(['success' => true, 'products' => $products]);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while searching.']);
        }
    }
}


// public function fetchProducts(Request $request)
// {
//     $products = Product::paginate(2);
//     return view('screens.web.products.list', compact('products'))->render();
// }






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






     // public function getVariantPrice(Request $request)
    // {
    //     $attributeValueIds = $request->input('attribute_values');
    //     $variant = Variant::whereHas('attributeValues', function ($query) use ($attributeValueIds) {
    //         $query->whereIn('attribute_value_id', $attributeValueIds);
    //     }, '=', count($attributeValueIds))->first();
    //     // dd($variant,$request->all());

    //     return response()->json(['price' => $variant ? $variant->price : null]);
    // }
