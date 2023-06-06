<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\TournamentLevel;
use App\Models\Affiliation;
use App\Http\Requests\StoreTournamentRequest;


class AffiliationController extends Controller
{
    public function index()
    {
        $affiliations = Affiliation::latest()->paginate(10);
        return view('admin.affiliations.index',
            [
                'affiliations' => $affiliations,
            ]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        return view('admin.affiliations.create');
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
        Affiliation::create($input);
        return redirect()->route('admin.affiliations.index')->with('flash_message_success','Affiliation added successfully');
    }
    public function edit($id)
    {
        $affiliation = Affiliation::findOrFail($id);
        return view('admin.affiliations.edit', compact('affiliation'));
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
        Affiliation::where('id',$id)->update($input);
        return redirect()->route('admin.affiliations.index')->with('flash_message_success','Tournament Level updated successfully');
    }
    public function delete($id)
    {
        Affiliation::where('id',$id)->delete();
        return redirect()->route('admin.affiliations.index')->with('flash_message_success','Tournament Level deleted successfully');
    }
    
}
