<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(Request $request)
    {
        if ($request->role == 'organizer') {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|unique:users,email',
                'phone_number' => 'required|unique:users,phone_number',
                'password' => 'required|string',
                'confirm_password' => 'required|string|same:password',
                'terms_and_conditions' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|unique:users,email',
                'phone_number' => 'required|unique:users,phone_number',
                'password' => 'required|string',
                'confirm_password' => 'required|string|same:password',
                'terms_and_conditions' => 'required',
            ]);
        }
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        // creaet 6 digit toekn
        $token = mt_rand(100000, 999999);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'org_name' => $request->org_name ?? null,
            'org_website' => $request->org_website ?? null,
            'org_mailing_address' => $request->org_mailing_address ?? null,
            'org_communication_method' => $request->org_communication_method ?? null,
            'org_timezone' => $request->org_timezone ?? null,
            'country' => $request->country ?? null,
            'city' => $request->city ?? null,
            'role' => $request->role ?? 'user',
            'postal_code' => $request->postal_code ?? null,
            'address' => $request->address ?? null,
            'password' => bcrypt($request->password),
            'verify_token' => $token,
        ]);


        return response()->json([
            'message' => 'Registration successful, please verify your email',
            'user' => $user,
        ], 201);



        // send email verification link using laravel mail
        // return response()->json([
        //     'message' => 'User registered successfully',
        //     'user' => $user,
        // ], 201);



        // $credentials = $request->only('email', 'password');
        // if (!Auth::attempt($credentials)) {
        //     return response()->json([
        //         'message' => 'Unauthorized',
        //     ], 401);
        // } else {
        //     $user = Auth::user();
        //     $token = $user->createToken('authToken')->plainTextToken;
        //     return response()->json([
        //         'message' => 'User registered successfully',
        //         'user' => $user,
        //         'token' => $token,
        //     ], 201);
        // }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'email or password is incorrect',
            ], 401);
        } else {
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
