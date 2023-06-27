<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\Tournament;
use App\Models\EventType;
use App\Http\Requests\StoreTournamentRequest;


class EventTypeController extends Controller
{
    public function index()
    {
        $tournament = EventType::latest()->paginate(10);
        return view('admin.event-types.index',
            [
                'faqs' => $tournament,
            ]);
    }
    public function show($id)
    {
       
    }
    public function create()
    {
        return view('admin.event-types.create');
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
        EventType::create($input);
        return redirect()->route('admin.event-types.index')->with('flash_message_success','Event Type added successfully');
    }
    public function edit($id)
    {
        $tournament = EventType::findOrFail($id);
        return view('admin.event-types.edit', compact('tournament'));
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
        EventType::where('id',$id)->update($input);
        return redirect()->route('admin.event-types.index')->with('flash_message_success','Event Type updated successfully');
    }
    public function delete($id)
    {
        EventType::where('id',$id)->delete();
        return redirect()->route('admin.event-types.index')->with('flash_message_success','Event Type deleted successfully');
    }
    
}
