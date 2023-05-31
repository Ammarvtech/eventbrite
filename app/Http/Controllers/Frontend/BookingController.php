<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function getAll(Request $request)
    {
        $bookings = Booking::with('intrests')->where('is_active', 1)->get();
        return response()->json(['data' => $bookings], 200);
    }
    
}
