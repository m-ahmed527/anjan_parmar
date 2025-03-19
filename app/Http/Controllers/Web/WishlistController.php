<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = auth()?->user()?->wishlist;
        // dd($wishlists);
        return view('screens.web.wishlists.index', get_defined_vars());
    }
    public function store(Product $product)
    {
        try {
            // dd($product->wishlistedByUsers()->exists());
            if (auth()->check()) {
                DB::beginTransaction();
                if (auth()->user()->hasWishlisted($product->id)) {
                    auth()->user()->wishlist()->detach($product->id);
                    $userWishlistCount = auth()->user()->wishlistCount();
                    DB::commit();
                    return response()->json([
                        'success' => true,
                        'message' => 'Removed from wishlist',
                        'wishlist_count' => $userWishlistCount,
                    ], 200);
                } else {
                    auth()->user()->wishlist()->attach($product->id);
                    $userWishlistCount = auth()->user()->wishlistCount();
                    DB::commit();
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
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to add to wishlist'
            ], 400);
        }
    }

    public function destroy(Product $product)
    {
        try {
            if (auth()->check()) {
                // dd($product);
                DB::beginTransaction();
                auth()->user()->wishlist()->detach($product->id);
                $userWishlistCount = auth()->user()->wishlistCount();
                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => 'Removed from wishlist',
                    'wishlist_count' => $userWishlistCount,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'You must be logged in to remove from wishlist'
                ], 200);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove from wishlist'
            ], 400);
        }
    }
}
