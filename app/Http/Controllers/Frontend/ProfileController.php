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
        $data = $request->all();
        try{
            $validator = Validator::make($data, [
                'name' => 'string',
                'firstname' => 'string',
                'lastname' => 'string',
                'phone_number' => 'string',
                'email' => 'email',
                'org_name' => 'string',
                'org_website' => 'string',
                'org_mailing_address' => 'string',
                'org_communication_method' => 'string',
                'org_timezone' => 'string',
                'country' => 'string',
                'city' => 'string',
                'state'=>'string',
                'facebook' => 'string',
                'twitter' => 'string',
                'instagram' => 'string',
                'linkedin' => 'string',
                'secondary_phone' => 'string',
                'secondary_email' => 'email',
                'postal_code' => 'string',
                'address' => 'string',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 422);
        }
        $user = User::where('id', $data['id'])->update($data);
        return response()->json(['data' => $user, 'message' => 'Profile updated successfully'], 200);
    }
}
