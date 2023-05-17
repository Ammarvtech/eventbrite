<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tournament;
use App\Models\TournamentImage;
use App\Models\TournamentCategory;

class TournamentController extends Controller
{
    public function getAll(){
        $tournaments = Tournament::with(['tournamentImages', 'tournamentCategories'])->where('is_active', 1)->get();
        return response()->json(['data' => $tournaments], 200);
    }
}
