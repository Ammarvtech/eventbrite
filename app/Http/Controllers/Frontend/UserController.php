<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        if ($request->role == 'organizer') {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|unique:users,email',
                'phone_number' => 'required|unique:users,phone_number',
                'org_name' => 'required|string',
                'org_website' => 'required|string',
                'org_mailing_address' => 'required|string',
                'org_communication_method' => 'required|string',
                'org_timezone' => 'required|string',
                'password' => 'required|string',
                'confirm_password' => 'required|string|same:password',
                'terms_and_conditions' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|unique:users,email',
                'phone_number' => 'required|unique:users,phone_number',
                'country' => 'required|string',
                'city' => 'required|string',
                'postal_code' => 'required|string',
                'address' => 'required|string',
                'password' => 'required|string',
                'confirm_password' => 'required|string|same:password',
                'terms_and_conditions' => 'required',
            ]);
        }
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
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
            'role' => $request->role,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'password' => bcrypt($request->password),
        ]);

        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        } else {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'message' => 'User registered successfully',
                'user' => $user,
                'token' => $token,
            ], 201);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            dd('if');
            return response()->json([
                'message' => 'email or password is incorrect',
            ], 401);
        } else {
            dd('else');
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'message' => 'User logged in successfully',
                'user' => $user,
                'token' => $token,
            ], 200);
        }
    }
}
