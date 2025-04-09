<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreOrderRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // dd(session('cart'));
        return view('screens.web.checkout.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $cart = session('cart');
            DB::beginTransaction();
            // dd($request->billingSanitized(), $request->shippingSanitized());
            $order = $this->createOrder($cart, $request->billingSanitized(), $request->shippingSanitized());
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
            ]);
        }
    }



    public function createOrder($cart, $billing, $shipping)
    {

        $order = auth()->user()->orders()->create([
            'payment_method' => 'Card',
            'payment_status' => 'Success',
            'order_status' => 'Created',
            'sub_total' => $cart['sub_total'],
            'total' => $cart['total'],
            'shipping_amount' => 0,
            'shipment_status' => 'Pending',
            'tax' => 0,
            'order_id' => Str::uuid(),
        ]);
        $order->billingAddress()->create($billing);
        if (!empty($shipping)) {
            $order->shippingAddress()->create($shipping);
        }
    }
}
