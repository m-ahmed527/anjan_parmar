<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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

    public function getOffersData()
    {
        $offers = Offer::with(['product', 'user'])->get();
        $offers->map(function ($offer) {
            $offer->search_key = $offer->id . $offer->user->first_name . $offer->product->name . $offer->offer_quantity . $offer->offer_price . $offer->total_price . $offer->offer_description;
        });
        return DataTables::of($offers)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function  show(Offer $offer)
    {
        return view('screens.admin.offers-management.details', get_defined_vars());
    }
}
