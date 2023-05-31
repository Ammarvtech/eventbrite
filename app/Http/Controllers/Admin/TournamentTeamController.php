<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\TournamentLevel;
use App\Models\NumberOfTeam;

class TournamentTeamController extends Controller
{
    public function index()
    {
        $tournament = NumberOfTeam::latest()->paginate(10);
        return view('admin.tournaments-teams.index',
            [
                'faqs' => $tournament,
            ]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        return view('admin.tournaments-teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_of_teams' => 'required',
        ], [
            'no_of_teams.required' => 'Number of teams is required',
        ]);
        $input['number_of_teams'] = $request->no_of_teams;
        $input['is_active'] = $request->status;
        //dd($input);
        NumberOfTeam::create($input);
        return redirect()->route('admin.tournaments-teams.index')->with('flash_message_success','Tournament Team added successfully');
    }
    public function edit($id)
    {
        $tournament = NumberOfTeam::findOrFail($id);
        return view('admin.tournaments-teams.edit', compact('tournament'));
    }
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'no_of_teams' => 'required',
        ], [
            'no_of_teams.required' => 'Level is required',
        ]);
        $input['number_of_teams'] = $request->no_of_teams;
        $input['is_active'] = $request->status;
        NumberOfTeam::where('id',$id)->update($input);
        return redirect()->route('admin.tournaments-teams.index')->with('flash_message_success','Tournament Team updated successfully');
    }
    public function delete($id)
    {
        NumberOfTeam::where('id',$id)->delete();
        return redirect()->route('admin.tournaments-teams.index')->with('flash_message_success','Tournament Team deleted successfully');
    }
    
}
