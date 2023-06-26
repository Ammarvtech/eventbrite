<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\TournamentLevel;
use App\Models\Affiliation;
use App\Http\Requests\StoreTournamentRequest;
use Illuminate\Support\Facades\DB;


class SettingsController extends Controller
{
    public function create()
    {

        $settings = DB::table('site_settings')->where('key', 'tournament_fee')->first();

        return view('admin.settings.create',
            [
                'settings' => $settings,
            ]);
    }

    public function store(Request $request)
    {
        $input['key'] = 'tournament_fee';
        $input['value'] = $request->tournament_fee;
        DB::table('site_settings')->insert($input);
        return redirect()->route('admin.settings.create')->with('flash_message_success','Setting added successfully');
    }
}
