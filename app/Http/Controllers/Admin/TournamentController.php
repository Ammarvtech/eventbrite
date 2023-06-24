<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\Tournament;
use App\Http\Requests\StoreTournamentRequest;


class TournamentController extends Controller
{
    public function index()
    {
        $tournament = Tournament::with('category')->latest()->paginate(10);
        return view('admin.tournaments.index',
            [
                'data' => $tournament,
            ]);
    }
    public function show($id)
    {
        $tournament = Tournament::with(
            'images', 
            'tournamentCategories',
            'category',
            'teams.teamMembers',
            'reviews.user',
            'tournamentType',
            )->findOrFail($id);
        // return $tournament;
        // dd($tournament->teams);
        return view('admin.tournaments.show', compact('tournament'));
    }
    public function create()
    {
        return view('admin.tournaments.create');
    }

    public function store(StoreTournamentRequest $request)
    {
        $data = $request->validated();
        $tournament = Tournament::create($data);
        if($tournament){
            return redirect()->route('admin.tournaments.index')->with('success', 'Tournament saved successfully');
        }
        return redirect()->route('admin.tournaments.index')->with('error', 'Something went wrong');
    }
    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('admin.tournaments.edit', compact('tournament'));
    }
    public function update(StoreTournamentRequest $request, $id)
    {
        $tournament = Tournament::findOrFail($id);
        $data = $request->validated();
        $tournament->update($data);
        return redirect()->route('admin.tournaments.index')->with('success', 'Tournament updated successfully');
    }
    public function featured(Request $request)
    {
        $tournament = Tournament::findOrFail($request->id);
        $tournament->is_featured = $request->is_featured;
        $tournament->save();
        return redirect()->route('admin.tournaments.index')->with('success', 'Tournament updated successfully');
    }
    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->is_active = 0;
        $tournament->save();
        return redirect()->route('admin.tournaments.index')->with('success', 'Tournament deleted successfully');
    }

    public function activate($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->is_active = 1;
        $tournament->save();
        return redirect()->route('admin.tournaments.index')->with('success', 'Tournament activated successfully');
    }


    
}
