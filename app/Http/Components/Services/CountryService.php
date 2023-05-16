<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Country;

class CountryService
{
    public function getAll()
    {
        return Country::latest()->get();
    }
   
}