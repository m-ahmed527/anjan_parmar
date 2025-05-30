<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\RequestStoreRequest;
use App\Http\Requests\Vendor\RequestUpdateRequest;
use App\Models\User;
use App\Models\VendorRequest;
use App\Notifications\VendorRequestNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RequestManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $requests = auth()->user()->vendorRequests;
        // dd(User::role("Admin")->first());
        return view('screens.vendor-store.request-management.index', get_defined_vars());
    }


    public function getRequestsData()
    {
        $requests = auth()->user()->vendorRequests;
        $requests->map(function ($request) {
            $request->search_key = $request->request_id  . $request->subject . $request->message . $request->status . $request->created_at;
        });
        return DataTables::of($requests)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('screens.vendor-store.request-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestStoreRequest $request)
    {
        // dd($request->sanitized());
        try {
            DB::beginTransaction();
            $vendorRequest = auth()->user()->vendorRequests()->create($request->sanitized());
            $admin = User::role("Admin")->first();
            $admin->notify(new VendorRequestNotification(
                "New Vendor Request",
                "Request ID: #{$vendorRequest->request_id} is received",
                route('admin.vendor.requests.detail', $vendorRequest->request_id)
            ));
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Request submitted successfully.'
            ], 200);
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit request. Please try again.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VendorRequest $vendorRequest)
    {
        // dd($vendorRequest->responses);
        foreach ($vendorRequest->responses as $response) {
            $response->update([
                'status' => 'received',
            ]);
        }
        return view('screens.vendor-store.request-management.details', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VendorRequest $vendorRequest)
    {

        return view('screens.vendor-store.request-management.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestUpdateRequest $request, VendorRequest $vendorRequest)
    {
        // dd($vendorRequest);
        try {
            DB::beginTransaction();
            $vendorRequest->update($request->sanitized());
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Request updated successfully.'
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update request. Please try again.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VendorRequest $vendorRequest)
    {
        // dd($vendorRequest);
        try {
            DB::beginTransaction();
            $vendorRequest->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Request deleted successfully.'
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete request. Please try again.'
            ]);
        }
    }
}
