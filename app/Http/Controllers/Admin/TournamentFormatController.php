<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\TournamentType;
use App\Models\TournamentFormat;
use App\Http\Requests\StoreTournamentRequest;


class TournamentFormatController extends Controller
{
    public function index()
    {
        $tournament = TournamentFormat::latest()->paginate(10);
        return view('admin.tournaments-formats.index',
            [
                'faqs' => $tournament,
            ]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        return view('admin.tournaments-formats.create');
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
        TournamentFormat::create($input);
        return redirect()->route('admin.tournaments-formats.index')->with('flash_message_success','Tournament Type added successfully');
    }
    public function edit($id)
    {
        $tournament = TournamentFormat::findOrFail($id);
        return view('admin.tournaments-formats.edit', compact('tournament'));
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
        TournamentFormat::where('id',$id)->update($input);
        return redirect()->route('admin.tournaments-formats.index')->with('flash_message_success','Tournament Type updated successfully');
    }
    public function delete($id)
    {
        TournamentFormat::where('id',$id)->delete();
        return redirect()->route('admin.tournaments-formats.index')->with('flash_message_success','Tournament Type deleted successfully');
    }
    
}
