<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
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
}
