<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\Wishlist;



class WishlistController extends Controller
{
    public function getAll(Request $request)
    {
        $tournaments = Tournament::with('wishlist','images','category')->whereHas('wishlist', function ($query) use ($request) {
            $query->where('user_id', $request->user_id);
        })
        ->where('title', 'LIKE', "%{$request->search}%")
        ->orderBy('created_at', $request->sort_order)
        ->paginate(10);
        return response()->json([
            'status' => 'success',
            'message' => 'Wishlist',
            'data' => $tournaments,
            'code' => '200'
        ],200);
    }
    public function addToWishlist(Request $request)
    {
        $wishlist = Wishlist::where('user_id', $request->user_id)->where('tournament_id', $request->tournament_id)->count();
        if ($wishlist > 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Tournament already added to wishlist',
                'code' => '422'
            ],422);
        } else {
            Wishlist::create([
                'user_id' => $request->user_id,
                'tournament_id' => $request->tournament_id,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Tournament added to wishlist',
                'code' => '200'
            ],200);
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
