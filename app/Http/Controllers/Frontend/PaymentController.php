<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;
use Stripe\StripeClient;
use App\Models\User;
use Exception;


class PaymentController extends Controller
{
    public function createStripeIntent(Request $request)
    {
        $res = [];
        $res['status'] = 0;
        $member = User::where('id', $request->user_id)->first();
        $input = $request->all();
        
        if ($input) {
 
            $stripe = new StripeClient('sk_test_51Moz1CFV8hMVqQzQZoplqqUTXaaIbqrJanKVG7hpwvHsH3x7uUl4euomLaicugVmjmXlga2ftQHvQ4UJNUHcDnNk00wom1iTYm');
            
            try {
      
                $amount = $request->amount;
                $total = floatval($amount);
                
                $cents = intval($total * 100);
                
                if (!empty($member->id)) {
                    $customer_id = $member->id;
                } else {
                    $customer = $stripe->customers->create([
                        'email' => $member->email,
                        'name' => $member->firstname . " " . $member->lastname,
                    ]);
                    $customer_id = $customer->id;
                }
                return response()->json($stripe);
                
                $intent = $stripe->paymentIntents->create([
                    'amount' => $cents,
                    'currency' => 'usd',
                    'customer' => $customer_id,
                    'setup_future_usage' => 'off_session',
                ]);
                
                $setupIntent = $stripe->setupIntents->create([
                    'customer' => $customer_id,
                ]);
                
                $arr = [
                    'paymentIntentId' => $intent->id,
                    'setup_client_secret' => $setupIntent->client_secret,
                    'setup_intent_id' => $setupIntent->id,
                    'client_secret' => $intent->client_secret,
                    'customer' => $customer_id,
                    'status' => 1,
                ];
                
                
                $res['arr'] = $arr;
                $res['status'] = 1;
                
            } catch (\Exception $e) {
                $arr['msg'] = "Error >> " . $e->getMessage();
                $arr['status'] = 0;
            }
        }
        
        return response()->json($res);
    }
}
