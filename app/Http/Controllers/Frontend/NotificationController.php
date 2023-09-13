<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\Tournament;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Exception;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;

class NotificationController extends Controller
{
    public function getAll()
    {
        $notification = Notification::all();    
        return response()->json(['data' => $notification], 200);
    }
}
