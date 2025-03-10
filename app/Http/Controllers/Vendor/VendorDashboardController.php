<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class VendorDashboardController extends Controller
{
    public function index()
    {
        $allProductsCount = auth()->user()->products->count();
        return view('screens.vendor-store.index', get_defined_vars());
    }
}
