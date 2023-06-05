<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\TournamentLevel;
use App\Models\TournamentFormat;
use App\Http\Requests\StoreTournamentRequest;


class TournamentLevelController extends Controller
{
    public function index()
    {
        $tournament = TournamentLevel::latest()->paginate(10);
        return view('admin.tournaments-levels.index',
            [
                'faqs' => $tournament,
            ]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        return view('admin.tournaments-levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
        ], [
            'level.required' => 'Level is required',
        ]);
        $input['level'] = $request->level;
        $input['is_active'] = $request->status;
        //dd($input);
        TournamentLevel::create($input);
        return redirect()->route('admin.tournaments-levels.index')->with('flash_message_success','Tournament Level added successfully');
    }
    public function edit($id)
    {
        $tournament = TournamentLevel::findOrFail($id);
        return view('admin.tournaments-levels.edit', compact('tournament'));
    }
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'level' => 'required',
        ], [
            'level.required' => 'Level is required',
        ]);
        $input['level'] = $request->level;
        $input['is_active'] = $request->status;
        TournamentLevel::where('id',$id)->update($input);
        return redirect()->route('admin.tournaments-levels.index')->with('flash_message_success','Tournament Level updated successfully');
    }
    public function delete($id)
    {
        TournamentLevel::where('id',$id)->delete();
        return redirect()->route('admin.tournaments-levels.index')->with('flash_message_success','Tournament Level deleted successfully');
    }
    
}
