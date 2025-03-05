<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\StoreContactRequest;
use App\Models\ContactUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('screens.web.contact-us.index');
    }

    public function store(StoreContactRequest $request)
    {
        try {
            DB::beginTransaction();

            $contact = ContactUs::create($request->sanitized());
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message. We will get back to you shortly.'
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request. Please try again later.'
            ], 500);
        }
    }
}
