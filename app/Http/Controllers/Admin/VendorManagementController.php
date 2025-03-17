<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\StoreStatusNotification;
use Exception;
use Illuminate\Http\Request;

class VendorManagementController extends Controller
{
    public function index(Request $request)
    {
        // $status = $request->status;
        $users = User::all();
        // dd($vendors[0]->hasRole('Vendor'));
        return view('screens.admin.vendor-management.index', get_defined_vars());
    }

    public function changeStatus(Request $request, User $vendor)
    {
        try {
            $status = $vendor->update([
                'status' => $request->newStatus,
            ]);
            if ($status) {
                $vendor->notify(new StoreStatusNotification(
                    'Your Store Reviewed.',
                    "Now Your Store is {$request->newStatus}.",
                    "#",
                ));
            }
            return response()->json([
                'success' => true,
                'status' => $request->newStatus,
                'message' => 'Vendor status updated successfully',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update vendor status. Please try again.',
            ], 400);
        }
    }
}
