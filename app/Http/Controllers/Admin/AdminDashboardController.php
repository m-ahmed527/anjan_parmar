<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        // $currentMonthOrdersCount = $this->getCountOrdersCurrentMonth();
        // $currenMonthRegisteredUserCount = $this->getRegisteredUserCountCurrentMonth();
        // $currenMonthRevenue = $this->getRevenueCountCurrentMonth();
        // $currenMonthSubscribedUsers = $this->getSubscribedUsersCurrentMonth();
        // $totalRevenue = $this->getTotalRevenue();
        // $currenMonthCanceledOrders =  $this->getCanceledOrdersCurrentMonth();
        // $pendingOrders = $this->getPendingOrders();
        return view('screens.admin.index', get_defined_vars());
    }

    public function getPendingOrders() {
        return count(Order::where('status','pending')->get());
    }

    public function getCanceledOrdersCurrentMonth() {
        return count(Order::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()])
        ->where('status','cancel')->get());
    }

    public function getSubscribedUsersCurrentMonth()  {
        return count(Newsletter::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()])->get());
    }

    public function getTotalRevenue() {
        return number_format(Order::sum('total_price'),2);
    }

    public function getCountOrdersCurrentMonth()
    {
        return count(Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get());
    }

    public function getRegisteredUserCountCurrentMonth()
    {
        return count(User::whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()])->get());
    }

    public function getRevenueCountCurrentMonth()
    {
        $orders = Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])
        ->where('payment_status','paid')->get();
        $sum = $orders->sum('total_price');
        return number_format($sum,2);
    }
}
