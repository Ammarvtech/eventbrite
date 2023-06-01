<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class BookingController extends Controller
{
    public function getAll(Request $request)
    {
        $bookings = Booking::with('intrests')->where('is_active', 1)->get();
        return response()->json(['data' => $bookings], 200);
    }

    public function bookingCreate(Request $request)
    {
        $data = request()->all();
    
        try {
            $validator = Validator::make($data, [
                'full_name' => 'string',
                'email' => 'email',
                'tournament_title' => 'string',
                'country_id' => 'string',
                'state' => 'string',
                'city' => 'string',
                'zip_code' => 'string',
                'address' => 'string',
                'phone' => 'string',
                'description' => 'string',

            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
            $data['otp'] = mt_rand(100000, 999999);
            
            $booking = Booking::create($data);
            return response()->json(['data' => $booking], 200);
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 422);
            }
    }
    public function reset_password(Request $request)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_new_password' => 'required|string|same:new_password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $user = User::where('id', $data['id'])->first();
        if ($user) {
            if (Hash::check($data['password'], $user->password)) {
                $user->password = bcrypt($data['new_password']);
                $user->save();
                return response()->json(['data' => 'Password updated successfully'], 200);
            } else {
                return response()->json(['error' => 'Old password is incorrect'], 422);
            }
        } else {
            return response()->json(['error' => 'User not found'], 422);
        }

    }
}
