<?php

namespace App\Http\Controllers\Web;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Variant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // session()->forget('cart');
        $cart = Cart::getCart();
        return view('screens.web.cart.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $variant_id = $request->input('variant_id');
        $attribute_values = $request->input('attribute_values', []);

        $response = Cart::addToCart(
            $request->product_id,
            $variant_id,
            $request->quantity,
            $attribute_values
        );
        // dd($response);
        if (!$response['success']) {
            return response()->json([
                'success' => $response['success'],
                'message' => $response['message']
            ], 400);
        } else {
            return response()->json($response, 200);
        }
    }



    public function removeFromCart(Request $request)
    {
        // dd($request->all());
        $response = Cart::removeFromCart($request->cart_id);
        if ($response['success']) {
            return response()->json($response, 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong.!"
            ]);
        }
    }

    public function updateCart(Request $request)
    {
        $response = Cart::updateCart(
            $request->cart_id,
            $request->quantity
        );
        if ($response['success']) {
            return response()->json($response, 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Something went wrong.!"
            ], 400);
        }
    }
}
