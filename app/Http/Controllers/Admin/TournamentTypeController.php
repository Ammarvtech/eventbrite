<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\Tournament;
use App\Models\TournamentType;
use App\Http\Requests\StoreTournamentRequest;


class TournamentTypeController extends Controller
{
    public function index()
    {
        $tournament = TournamentType::latest()->paginate(10);
        return view('admin.tournaments-types.index',
            [
                'faqs' => $tournament,
            ]);
    }
    public function show($id)
    {
       
    }
    public function create()
    {
        return view('admin.tournaments-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);
        $input['name'] = $request->name;
        $input['is_active'] = $request->status;
        //dd($input);
        TournamentType::create($input);
        return redirect()->route('admin.tournaments-types.index')->with('flash_message_success','Tournament Type added successfully');
    }
    public function edit($id)
    {
        $tournament = TournamentType::findOrFail($id);
        return view('admin.tournaments-types.edit', compact('tournament'));
    }
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Name is required',
        ]);
        $input['name'] = $request->name;
        $input['is_active'] = $request->status;
        TournamentType::where('id',$id)->update($input);
        return redirect()->route('admin.tournaments-types.index')->with('flash_message_success','Tournament Type updated successfully');
    }
    public function delete($id)
    {
        TournamentType::where('id',$id)->delete();
        return redirect()->route('admin.tournaments-types.index')->with('flash_message_success','Tournament Type deleted successfully');
    }
    
}
