<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use App\Models\ShippingCharge;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShippingChargesManagementController extends Controller
{
    public function index() : View {
        $shippingCharge = ShippingCharge::all();
        return view('screens.admin.shipping-charges-management.index',compact('shippingCharge'));
    }

    public function edit(ShippingCharge $shippingCharge) : View {
        return view('screens.admin.shipping-charges-management.edit',compact('shippingCharge'));
    }
    
      public function update(Request $request,ShippingCharge $shippingCharge ){
        $validated = $request->validate([
            'flate_rate' => 'sometimes',
            'others' => 'sometimes',
            ]);
        
        $shippingCharge->update([
                'flat_rate' => $request->flat_rate ? $request->flat_rate : 0.00,
                'others' => $request->others == 'on' ? 1 : 0,
                ]);
        return redirect()->route('admin.shipping.charges.index');   
           
    }
}
