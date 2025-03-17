<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactUs::all();
        return view('screens.admin.contact-management.index', get_defined_vars());
    }



    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contact)
    {
        // dd($contact);
        return view('screens.admin.contact-management.detail', get_defined_vars());
    }
}
