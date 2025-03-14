<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return view('screens.admin.offers-management.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function  show(Offer $offer)
    {
        return view('screens.admin.offers-management.details', get_defined_vars());
    }
}
