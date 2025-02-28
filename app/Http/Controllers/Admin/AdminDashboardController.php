<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $allProductsCount = Product::count();
        $premiumProductsCount = Product::where('is_premium', 1)->count();
        $allVendorsCount = User::role('Vendor')->count();
        $allApprovedVendorsCount = User::where('status', 'approved')->role('Vendor')->count();
        $allRejectedVendorsCount = User::where('status', 'rejected')->role('Vendor')->count();
        $allPendingVendorsCount = User::where('status', 'pending')->role('Vendor')->count();
        $allUsersCount = User::role('User')->count();
        // dd($allProductsCount, $premiumProductsCount, $allVendorsCount, $allApprovedVendorsCount, $allRejectedVendorsCount, $allPendingVendorsCount, $allUsersCount);
        return view('screens.admin.index', get_defined_vars());
    }

    public function getPendingOrders()
    {
        return count(Order::where('status', 'pending')->get());
    }

    public function getCanceledOrdersCurrentMonth()
    {
        return count(Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])
            ->where('status', 'cancel')->get());
    }

    public function getSubscribedUsersCurrentMonth()
    {
        return count(Newsletter::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get());
    }

    public function getTotalRevenue()
    {
        return number_format(Order::sum('total_price'), 2);
    }

    public function getCountOrdersCurrentMonth()
    {
        return count(Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get());
    }

    public function getRegisteredUserCountCurrentMonth()
    {
        return count(User::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get());
    }

    public function getRevenueCountCurrentMonth()
    {
        $orders = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])
            ->where('payment_status', 'paid')->get();
        $sum = $orders->sum('total_price');
        return number_format($sum, 2);
    }
}
