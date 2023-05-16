<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number',
            'org_name' => 'required|string',
            'org_website' => 'required|string',
            'org_mailing_address' => 'required|string',
            'org_communication_method' => 'required|string',
            'org_timezone' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'address' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'org_name' => $request->org_name,
            'org_website' => $request->org_website,
            'org_mailing_address' => $request->org_mailing_address,
            'org_communication_method' => $request->org_communication_method,
            'org_timezone' => $request->org_timezone,
            'country' => $request->country,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
