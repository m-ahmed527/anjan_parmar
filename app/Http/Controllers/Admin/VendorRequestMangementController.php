<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendorRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorRequestMangementController extends Controller
{
    public function index()
    {
        $requests = VendorRequest::all();
        return view('screens.admin.vendor-request-management.index', get_defined_vars());
    }
    public function show(VendorRequest $vendorRequest)
    {
        return view('screens.admin.vendor-request-management.details', get_defined_vars());
    }

    public function reply(Request $request, VendorRequest $vendorRequest)
    {
        // dd($vendorRequest, $request->all());
        $request->validate([
            'reply' => 'required|string',
        ], [
            'reply.required' => 'Please enter a reply.',
            'reply.string' => 'Reply must be a string.',
        ]);
        try {
            DB::beginTransaction();
            $vendorRequest->responses()->create([
                'response_id' => rand(10000, 100000),
                'reply' => $request->reply,
            ]);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Reply sent successfully.',
            ], 200);
        } catch (Exception $e) {
            // dd($e->getMessage());
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while sending the reply.',
            ], 400);
        }
    }
    public function allReplies(VendorRequest $vendorRequest)
    {
        $replies = $vendorRequest->responses;
        dd($replies);
        return view('screens.admin.vendor-request-management.replies', get_defined_vars());
    }
}
