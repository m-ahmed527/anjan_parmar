<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OrderManagementController extends Controller
{
    public function index(): View
    {
        // $orders = Order::with(['user'])->get();
        // $orders->map(function ($order) {
        //     $order->search_key = $order->order_id . $order->payment_method . $order->payment_status . $order->order_status . $order->total . $order->created_at;
        // });
        // dd($orders);
        return view('screens.admin.order-management.index', get_defined_vars());
    }

    public function getOrdersData()
    {
        $orders = Order::with(['user'])->get();
        $orders->map(function ($order) {
            $order->search_key = $order->user->first_name . $order->order_id . $order->payment_method . $order->payment_status . $order->order_status . $order->total . $order->created_at;
        });
        return DataTables::of($orders)->make(true);
    }
    public function orderDetails(Order $order): View
    {
        $order->load(['user', 'products', 'billingAddress', 'shippingAddress']);
        // dd($order);
        return view('screens.admin.order-management.detail', get_defined_vars());
    }
    public function orderVariantDetails(Order $order): View
    {

        return view('screens.admin.order-management.variant-detail', compact('order'));
    }

    public function changeStatus(Order $order)
    {

        try {
            $order->update([
                'status' => request()->status == 'pending' ? 'delivered' : 'pending',
            ]);

            return response()->json([
                'status' => $order->status,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
