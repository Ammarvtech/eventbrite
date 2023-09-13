<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function getAll()
    {
        $settings = DB::table('site_settings')->get();
        $social_yelp = $settings->where('key', 'social_yelp')->first();
        $social_google_store = $settings->where('key', 'social_google_store')->first();
        $social_linkedin = $settings->where('key', 'social_linkedin')->first();
        $social_instagram = $settings->where('key', 'social_instagram')->first();
        $social_facebook = $settings->where('key', 'social_facebook')->first();
        $tournament_fee = $settings->where('key', 'tournament_fee')->first();

        return response()->json(['data' =>[
            'social_yelp' => $social_yelp,
            'social_google_store' => $social_google_store,
            'social_linkedin' => $social_linkedin,
            'social_instagram' => $social_instagram,
            'social_facebook' => $social_facebook,
            'tournament_fee' => $tournament_fee,
        ]], 200);
    }
}
