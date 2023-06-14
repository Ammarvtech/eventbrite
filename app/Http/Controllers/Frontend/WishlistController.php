<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;


class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        $wishlist = Wishlist::where('user_id', $request->user_id)->where('tournament_id', $request->tournament_id)->count();
        if ($wishlist > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tournament already added to wishlist',
            ]);
        } else {
            Wishlist::create([
                'user_id' => $request->user_id,
                'tournament_id' => $request->tournament_id,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Tournament added to wishlist',
            ]);
        }
    }

    public function removeFromWishlist(Request $request)
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->where('tournament_id', $request->tournament_id)->first();
        if ($wishlist) {
            $wishlist->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Tournament removed from wishlist',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Tournament not found in wishlist',
            ]);
        }
    }

}
