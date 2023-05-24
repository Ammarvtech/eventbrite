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

class TournamentController extends Controller
{
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

    public function getAll(){
        $tournaments = Tournament::with(['images', 'tournamentCategories','category'])->where('is_active', 1)->get();
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
}
