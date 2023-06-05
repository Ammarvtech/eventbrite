<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\TournamentType;
use App\Models\TournamentEvent;
use App\Http\Requests\StoreTournamentRequest;


class TournamentEventController extends Controller
{
    public function index()
    {
        $tournament = TournamentEvent::latest()->paginate(10);
        return view('admin.tournaments-events.index',
            [
                'faqs' => $tournament,
            ]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        return view('admin.tournaments-events.create');
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
        TournamentEvent::create($input);
        return redirect()->route('admin.tournaments-events.index')->with('flash_message_success','Tournament Event added successfully');
    }
    public function edit($id)
    {
        $tournament = TournamentEvent::findOrFail($id);
        return view('admin.tournaments-events.edit', compact('tournament'));
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
        TournamentEvent::where('id',$id)->update($input);
        return redirect()->route('admin.tournaments-events.index')->with('flash_message_success','Tournament Event updated successfully');
    }
    public function delete($id)
    {
        TournamentEvent::where('id',$id)->delete();
        return redirect()->route('admin.tournaments-formats.index')->with('flash_message_success','Tournament Event deleted successfully');
    }
    
}
