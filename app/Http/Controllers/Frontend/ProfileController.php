<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function getUserProfile(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        return response()->json(['data' => $user], 200);
    }

    public function updateUserProfile(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->name = $request->name;
        $user->mobile_no = $request->mobile_no;
        $user->save();
        return response()->json(['data' => $user], 200);
    }
}
