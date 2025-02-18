<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    public function index() : View {
        $orders = Order::all();
        return view('screens.admin.order-management.index',compact('orders'));
    }

    public function orderDetails(Order $order) : View {
        return view('screens.admin.order-management.detail',compact('order'));
    }
    public function orderVariantDetails(Order $order) : View {
        return view('screens.admin.order-management.variant-detail',compact('order'));
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
