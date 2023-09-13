<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\Tournament;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Exception;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;

class TeamController extends Controller
{
    public function teamsByUser (Request $request)
    {
        $user_id = $request->user_id;
        $tournament = Tournament::with(
            'images', 
            'tournamentCategories',
            'category',
            'teams.teamMembers',
            'reviews.user',
            'tournamentType',
            )->whereHas('teams', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->latest()->paginate(10);
        return response()->json(['data' => $tournament], 200);
    }
    public function create(Request $request)
    {
        $data = request()->all();
        try {
            $validator = Validator::make($data, [
                'team_name' => 'required|string',
                'skill' => 'required|string',
                'full_name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'teams' => 'required',
                'teams.*.mem_name' => 'required|string',
                'teams.*.mem_email' => 'required|email',
                'teams.*.mem_phone' => 'required|string',
                'teams.*.role' => 'required|string',
                'teams.*.emergency_name' => 'required|string',
                'teams.*.emergency_phone' => 'required|string',
                'waivers_email' => 'required|email',
            ],[
                'team_name.required' => 'The team name field is required.',
                'skill.required' => 'The team skill field is required.',
                'full_name.required' => 'The team capton full name field is required.',
                'email.required' => 'The team capton email field is required.',
                'phone.required' => 'The team capton phone field is required.',
                'teams.*.mem_name.required' => 'The team member name field is required.',
                'teams.*.mem_email.required' => 'The team member email field is required.',
                'teams.*.mem_phone.required' => 'The team member phone field is required.',
                'teams.*.role.required' => 'The team member role field is required.',
                'teams.*.emergency_name.required' => 'The team member emergency name field is required.',
                'teams.*.emergency_phone.required' => 'The team member emergency phone field is required.',
                'waivers_email.required' => 'The Waivers and Liability Forms email field is required.',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }

            $data['waivers_file'] = '';
            $data['logo'] = '';
            $data['payment_method'] = 'visa';
            $data['payment_prof'] = '';
            // $data['payment_status'] = 'pending';
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $file = $file->store('uploads', 'public');
                $data['logo'] = $file;
            }
            if ($request->hasFile('waivers_file')) {
                $file = $request->file('waivers_file');
                $file = $file->store('uploads', 'public');  
                $data['waivers_file'] = $file;
            }
            if ($request->hasFile('payment_prof')) {
                $file = $request->file('payment_prof');
                $file = $file->store('uploads', 'public');  
                $data['payment_prof'] = $file;
            }
            DB::beginTransaction();
            try {
                $teams = new Team();
                $teams->tournament_id = $data['tournament_id'];
                $teams->user_id = $data['user_id'];
                $teams->team_name = $data['team_name'];
                $teams->affiliation = $data['affiliation'];
                $teams->team_color = $data['team_color'];
                $teams->skill = $data['skill'];
                $teams->full_name = $data['full_name'];
                $teams->email = $data['email'];
                $teams->phone = $data['phone'];
                $teams->waivers_email = $data['waivers_email'];
                $teams->waivers_file = $data['waivers_file'];
                $teams->payment_method ='stripe';
                $teams->payment_prof = $data['payment_prof'];
                $teams->payment_status = 'pending';
                $teams->logo = $data['logo'];
                $teams->save();

                $team_id = $teams->id;
                $team_members = json_decode($data['teams'], true);
                // return response()->json(['data' => $team_members], 200);
                foreach ($team_members as $team_member) {
                    $team_members = new TeamMember();
                    $team_members->team_id = $team_id;
                    $team_members->mem_name = $team_member['mem_name'];
                    $team_members->mem_email = $team_member['mem_email'];
                    $team_members->mem_phone = $team_member['mem_phone'];
                    $team_members->role = $team_member['role'];
                    $team_members->emergency_name = $team_member['emergency_name'];
                    $team_members->emergency_phone = $team_member['emergency_phone'];

                    // if (isset($team_member['logo'])) {
                    //     $file = $team_member['logo'];
                    //     $file = $file->store('uploads', 'public');
                    //     $team_members->logo = $file;
                    // }
                    $team_members->save();
                }
                
                $data = Team::with('teamMembers')->where('id', $team_id)->first();
                $team = Team::where('id', $team_id)->first();
                $tournament = Tournament::where('id', $team->tournament_id)->first();
                $team->payment_status = 'paid';
                Notification::create([
                    'user_id' => $team->user_id,
                    'tournament_id' => $team->tournament_id,
                    'title' => 'Team Created',
                    'description' => 'Your team has been created successfully for '.$tournament->name.' tournament.',
                ]);
                DB::commit();
                return response()->json(['data' => $team_members], 200);
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['error' => $e->getMessage()], 422);
            }
    
         
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
    public function delete($team_id)
    {
        TeamMember::where('team_id', $team_id)->delete();
        $team = Team::where('id', $team_id)->first();
        $team->delete();
        return response()->json(['data' => 'deleted'], 200);
    }
}
