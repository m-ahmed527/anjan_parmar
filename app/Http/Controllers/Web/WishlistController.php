<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = auth()->user()->wishlist;
        // dd($wishlists);
        return view('screens.web.wishlists.index', get_defined_vars());
    }
    public function store(Product $product)
    {
        try {
            // dd($product->wishlistedByUsers()->exists());
            if (auth()->check()) {
                if (auth()->user()->hasWishlisted($product->id)) {
                    auth()->user()->wishlist()->detach($product->id);
                    $userWishlistCount = auth()->user()->wishlistCount();
                    return response()->json([
                        'success' => true,
                        'message' => 'Removed from wishlist',
                        'wishlist_count' => $userWishlistCount,
                    ], 200);
                } else {
                    auth()->user()->wishlist()->attach($product->id);
                    $userWishlistCount = auth()->user()->wishlistCount();
                    return response()->json([
                        'success' => true,
                        'message' => 'Added to wishlist',
                        'wishlist_count' => $userWishlistCount,
                    ], 200);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'You must be logged in to add to wishlist'
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add to wishlist'
            ], 400);
        }
    }
}
