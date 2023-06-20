<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\TournamentImage;
use App\Models\TournamentCategory;
use App\Models\Category;
use App\Models\TournamentType;
use App\Models\EventCategory;
use App\Models\Country;
use App\Models\NumberOfTeam;
use App\Models\TournamentFormat;
use App\Models\TournamentLevel;
use App\Http\Requests\StoreTournamentRequest;
use Stripe\StripeClient;

class TournamentController extends Controller
{

    public function tournamentDetail(Request $request){
        
        $tournament = Tournament::with([
            'images', 
            'tournamentCategories',
            'category',
            'teams.teamMembers',
            'reviews.user',
            'tournamentType',
            ])
        ->where('is_active', 1)
        ->where('id', $request->id)
        ->first();

        return response()->json(['data' => $tournament], 200);
    }
    public function getDetails(){
        $categories = Category::all();
        $tournamentTypes = TournamentType::all();
        $eventTyeps = EventCategory::all();
        $countries = Country::all();
        $numberOfTeams = NumberOfTeam::all();
        $tournamentFormats = TournamentFormat::all();
        $tournamentLevels = TournamentLevel::all();
        return response()->json([
            'categories' => $categories,
            'tournamentTypes' => $tournamentTypes,
            'eventTyeps' => $eventTyeps,
            'countries' => $countries,
            'numberOfTeams' => $numberOfTeams,
            'tournamentFormats' => $tournamentFormats,
            'tournamentLevels' => $tournamentLevels,
        ], 200);
    }

    public function getAll(Request $request){
        $sort = 'desc';
        if($request->has('sort')){
            $sort = $request->sort;
        }
        $tournaments = Tournament::with(['images', 'tournamentCategories','category'])
            ->where('is_active', 1)
            ->orderBy('id', $sort)
            ->latest()
            ->paginate(10);
        if($request->has('category') || $request->has('postal_code')){
            if($request->category != ""){
                $tournaments = Tournament::with(['images', 'tournamentCategories','category'])->where('is_active', 1)
                ->whereHas('category', function($query) use ($request){
                    $query->where('name', $request->category);
                })
                ->orderBy('id', $sort)
                ->paginate(10);
            }
            if($request->postal_code != ""){
                $tournaments = Tournament::with(['images', 'tournamentCategories','category'])->where('is_active', 1)
                ->where('postal_code', $request->postal_code)
                ->orderBy('id', $sort)
                ->paginate(10);
            }
            if($request->category != "" && $request->postal_code != ""){
                $tournaments = Tournament::with(['images', 'tournamentCategories','category'])->where('is_active', 1)
                ->whereHas('category', function($query) use ($request){
                    $query->where('name', $request->category);
                })
                ->orWhere('postal_code', $request->postal_code)
                ->orderBy('id', $sort)
                ->paginate(10);
            }
            // $tournaments = Tournament::with(['images', 'tournamentCategories','category'])->where('is_active', 1)
            // ->whereHas('category', function($query) use ($request){
            //     $query->where('name', $request->category);
            // })
            // ->orWhere('postal_code', $request->postal_code)
            // ->orderBy('id', 'desc')
            // ->paginate(10);
        }
        return response()->json(['data' => $tournaments], 200);
    }
    public function getTournament($id){
        $tournament = Tournament::with(['tournamentImages', 'tournamentCategories'])->where('id', $id)->first();
        return response()->json(['data' => $tournament], 200);
    }
    // save tournament
    public function upload(Request $request){

        $data = $request->all();
        if($request->hasFile('files')){
            return response()->json(['abc' => $data], 200);
        }
    }
    // save tournament
    public function create(Request $request){

        $data = $request->all();
        $tournament = Tournament::create($data);
        if ($request->hasFile('logos')) {
            foreach($data['logos'] as $logo){
                $logo = $logo->store('uploads', 'public');
                $tournamentImage = new TournamentImage();
                $tournamentImage->tournament_id = $tournament->id;
                $tournamentImage->caption = 'logo';
                $tournamentImage->image = $logo;
                $tournamentImage->save();
            }
        }
        if ($request->hasFile('banners')) {
            foreach($data['banners'] as $logo){
                $banner = $logo->store('uploads', 'public');
                $tournamentImage = new TournamentImage();
                $tournamentImage->tournament_id = $tournament->id;
                $tournamentImage->caption = 'banner';
                $tournamentImage->image = $banner;
                $tournamentImage->save();
            }
        }
    
        if($tournament){
            return response()->json(['message' => 'Tournament saved successfully'], 200);
        }
        return response()->json(['message' => 'Something went wrong'], 400);
    }
    // update tournament
    public function update(Request $request, $id){
        $data = $request->all();
        $tournament = Tournament::where('id', $id)->update($data);
        // save tournament images
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/tournament'), $name);
                $tournamentImage = new TournamentImage();
                $tournamentImage->tournament_id = $id;
                $tournamentImage->image = $name;
                $tournamentImage->save();
            }
        }
        // save tournament categories
        if($request->has('categories')){
            foreach($request->categories as $category){
                $tournamentCategory = new TournamentCategory();
                $tournamentCategory->tournament_id = $id;
                $tournamentCategory->category_id = $category;
                $tournamentCategory->save();
            }
        }
        return response()->json(['message' => 'Tournament updated successfully'], 200);
    }
    // delete tournament
    public function delete($id){
        $tournament = Tournament::where('id', $id)->delete();
        return response()->json(['message' => 'Tournament deleted successfully'], 200);
    }
    // create-indent-payment
    public function create_stripe_intent(Request $request){
        $res=array();
        $res['status']=0;
        // $header = $request->header('Authorization');
        // $member=$this->authenticate_verify_token($header);
        $input = $request->all();
        if($input){
            $stripe = new StripeClient('sk_test_51Moz1CFV8hMVqQzQZoplqqUTXaaIbqrJanKVG7hpwvHsH3x7uUl4euomLaicugVmjmXlga2ftQHvQ4UJNUHcDnNk00wom1iTYm');
            try{
                $amount = $input['amount'];
                if(!empty($input['expires_in'])){
                    // $expires_in=$input['expires_in'];
                    // $total=floatval($amount) * intval($expires_in);
                    $total=floatval($amount);
                }
                else{
                    $total=floatval($amount);
                }

                $cents = intval($total * 500);
                // if(!empty($member->customer_id)){
                //     $customer_id=$member->customer_id;
                // }
                // else{
                    $customer = $stripe->customers->create([
                        'email' =>'ammar@gmail.com',
                        'name' =>'Ammar Ali',
                        // 'address' => $stripe_adddress,
                    ]);
                    $customer_id=$customer->id;
                // }

                $intent= $stripe->paymentIntents->create([
                    'amount' => $cents,
                    'currency' => 'usd',
                    'customer'=>$customer_id,
                    // 'payment_method' => $vals['payment_method'],
                    'setup_future_usage' => 'off_session',
                ]);
                $setupintent=$stripe->setupIntents->create([
                    'customer' => $customer_id,
                ]);
                // return response()->json(['data' => $setupintent], 200);
                $arr=array(
                        'paymentIntentId'=>$intent->id,
                        'setup_client_secret'=>$setupintent->client_secret,
                        'setup_intent_id'=>$setupintent->id,
                        'client_secret'=>$intent->client_secret,
                        'customer'=>$customer_id,
                        'status'=>1
                );
                $res['arr']=$arr;
                $res['status']=1;
                return response()->json(['data' => $res], 200);
                    // print_r($res);
            }
            catch(Exception $e) {
                $arr['msg']="Error >> ".$e->getMessage();
                $arr['status']=0;
            }
        }
        exit(json_encode($res));
    }
}
