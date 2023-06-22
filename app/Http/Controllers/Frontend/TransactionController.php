<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Wallet;

class TransactionController extends Controller
{
    public function getAll(Request $request,$user_id)
    {
        $user = User::find($user_id);
        $user->load('wallet.transaction.tournament');
        return response()->json(['data' => $user], 200);
    }
}
