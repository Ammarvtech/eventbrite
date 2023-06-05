<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Exception;


class TeamController extends Controller
{
    public function create (Request $request)
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
            // $data['payment_status'] = 'pending';
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file = $file->store('uploads', 'public');
                $data['logo'] = $file;
            }
            if ($request->hasFile('waivers_file')) {
                $file = $request->file('waivers_file');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file = $file->store('uploads', 'public');  
                $data['waivers_file'] = $file;
            }

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
            $teams->payment_method = 'abc';
            $teams->payment_prof = 'abc';
            $teams->logo = $data['logo'];
            $teams->save();

            $team_id = $teams->id;
            $team_members = json_decode($data['teams'], true);
            foreach ($team_members as $team_member) {
                $team_members = new TeamMember();
                $team_members->team_id = $team_id;
                $team_members->mem_name = $team_member['mem_name'];
                $team_members->mem_email = $team_member['mem_email'];
                $team_members->mem_phone = $team_member['mem_phone'];
                $team_members->role = $team_member['role'];
                $team_members->emergency_name = $team_member['emergency_name'];
                $team_members->emergency_phone = $team_member['emergency_phone'];
                $team_members->save();
            }
            $data = Team::with('teamMembers')->where('id', $team_id)->first();
            return response()->json(['data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
}
