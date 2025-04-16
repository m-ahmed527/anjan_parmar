<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $contacts = ContactUs::all();
        return view('screens.admin.contact-management.index', get_defined_vars());
    }

    public function getContactData()
    {
        $contacts = ContactUs::all();
        $contacts->map(function ($contact) {
            $contact->search_key = $contact->name . $contact->email . $contact->phone;
        });
        return DataTables::of($contacts)->make(true);
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
