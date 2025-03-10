<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'approved')->get();
        $stores = $users->map(function ($user) {
            if ($user->hasRole('Vendor')) {
                return [
                    'store' => $user,
                ];
            }
        })->filter();
        // dd($stores);
        return view('screens.web.stores.index', get_defined_vars());
    }
}
