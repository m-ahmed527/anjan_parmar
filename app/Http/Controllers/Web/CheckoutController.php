<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreOrderRequest;
use App\Models\User;
use App\Notifications\NewOrderNotification;
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
            $admin = User::role('Admin')->first();
            $order = $this->createOrder($cart, $request->billingSanitized(), $request->shippingSanitized());
            $admin->notify(new NewOrderNotification(
                'New Order Placed',
                "{$order->user->first_name} Placed a order",
                route('admin.order.details', $order->order_id),
            ));
            session()->forget('cart');
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
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
        $this->createOrderItems($order, $cart['items']);
        return $order;
    }

    private function createOrderItems($order, $items)
    {
        foreach ($items as $item) {
            $order->products()->attach($item['product_id'], [
                'product_name'   => $item['name'],
                'variant_id'     => $item['variant_id'],
                'variant_name'   => $item['variant_name'],
                'quantity'       => $item['item_quantity'],
                'product_price'  => $item['product_price'],
                'variant_price'  => $item['variant_price'],
                'price'          => $item['price'],
                'discount'       => 0,
                'sub_total'      => $item['item_sub_total'],
                'total'          => $item['item_total'],
                // 'created_at'     => now(),
                // 'updated_at'     => now(),
            ]);
        }
    }
    // private function createOrderItems($order, $items)
    // {
    //     // $products = $this->prepareOrderItems($items);
    //     // dd($products);
    //     // $order->products()->attach($products);
    // }
    private function prepareOrderItems($items)
    {
        dd($items);
        $products = [];
        foreach ($items as $item) {
            $products[$item['product_id']] = [
                'product_name' => $item['name'],
                'variant_id' => $item['variant_id'],
                'variant_name' => $item['variant_name'],
                'quantity' => $item['item_quantity'],
                'product_price' => $item['product_price'],
                'variant_price' => $item['variant_price'],
                'price' => $item['price'],
                'discount' => 0,
                'sub_total' => $item['item_sub_total'],
                'total' => $item['item_total'],
            ];
        }
        return $products;
    }
}
