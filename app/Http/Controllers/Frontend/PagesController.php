<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function home(){
        $page = DB::table('home_cms')->first();
        return response()->json([
            'data' => $page,
            'tournaments' => Tournament::with(['images', 'tournamentCategories','category'])
                            ->where('is_active', 1)
                            ->orderBy('id', 'desc')
                            ->latest()
                            ->take(5)
                            ->get(),
            'trending_tournaments' => Tournament::with(['images', 'tournamentCategories','category'])
                            ->where('is_active', 1)
                            ->orderBy('created_at', 'asc')
                            ->latest()
                            ->take(5)
                            ->get(),
            // 'trending_tournaments' => DB::table('tournaments')->where('is_active', '1')->orderBy('created_at', 'desc')->take(5)->get(),
    
        ], 200);
    }
    public function privacyPolicy()
    {
        $page = Page::where('slug', 'privacy-policy')->first();
        return response()->json(['data' => $page], 200);
    }
    public function termsAndConditions()
    {
        $page = Page::where('slug', 'terms-and-conditions')->first();
        return response()->json(['data' => $page], 200);
    }
    public function disclaimer(){
        $page = Page::where('slug', 'disclaimer')->first();
        return response()->json(['data' => $page], 200);
    }
    public function aboutUs(){
        $page = DB::table('about_us')->first();
        // dd($page);
        return response()->json(['data' => $page], 200);
    }
    public function contactUs(){
        $page = DB::table('contact_us_cms')->first();
        return response()->json(['data' => $page], 200);
    }
    public function saveContactUs(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'looking_for' => 'required',
            'message' => 'required',    
        ]);
        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $data = $request->all();
        DB::table('contact_us_queries')->insert($data);
        return response()->json(['message' => 'Contact us saved successfully'], 200);
    }

    public function faq(){
        $page = DB::table('faq')->get();
        return response()->json(['data' => $page], 200);
    }

}
