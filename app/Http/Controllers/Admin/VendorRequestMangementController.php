<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VendorRequest;
use App\Models\VendorResponse;
use App\Notifications\VendorResponseNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class VendorRequestMangementController extends Controller
{
    public function index()
    {
        $requests = VendorRequest::all();
        return view('screens.admin.vendor-request-management.index', get_defined_vars());
    }

    public function getVendorRequestsData()
    {
        $requests = VendorRequest::with('vendor')->get();
        $requests->map(function ($request) {
            $request->search_key = $request->request_id . $request->vendor->first_name . $request->vendor->business_name . $request->subject . $request->status . $request->created_at;
        });
        return DataTables::of($requests)->make(true);
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
            $vendorRequest->update([
                'status' => 'responded',
            ]);
            $vendor = $vendorRequest->vendor;
            $vendor->notify(new VendorResponseNotification(
                'Reply from Admin',
                "Reply on Request ID:{$vendorRequest->request_id}",
                route('vendor.requests.show', $vendorRequest->request_id)
            ));
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
        // $replies = $vendorRequest->responses;
        // dd($vendorRequest);
        return view('screens.admin.vendor-request-management.replies', get_defined_vars());
    }

    public function getAllRepliesData(VendorRequest $vendorRequest)
    {
        $vendorRequest->load('responses');
        $responses = $vendorRequest->responses;
        $responses->map(function ($response) {
            $response->search_key = $response->response_id . $response->reply . $response->status . $response->created_at;
        });
        return DataTables::of($responses)->make(true);
    }
    public function deleteReply(VendorResponse $vendorRequestReply)
    {
        try {
            // dd($vendorRequestReply);
            DB::beginTransaction();
            $vendorRequestReply->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Reply deleted successfully.',
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the reply.',
            ], 400);
        }
    }
}
