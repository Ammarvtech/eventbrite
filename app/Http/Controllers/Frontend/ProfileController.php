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
        $userId = '52';
        $user = User::where('id', $userId)->first();
        return response()->json(['data' => $user], 200);
    }
}
