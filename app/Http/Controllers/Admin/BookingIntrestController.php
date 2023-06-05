<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\OrganizationService;
use App\Models\TournamentLevel;
use App\Models\Intrest;

class BookingIntrestController extends Controller
{
    public function index()
    {
        $tournament = Intrest::latest()->paginate(10);
        return view('admin.booking-intrests.index',
            [
                'faqs' => $tournament,
            ]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        return view('admin.booking-intrests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
        ], [
            'full_name.required' => 'Full name is required',
        ]);
        $input['full_name'] = $request->full_name;
        $input['is_active'] = $request->status;
        $input['booking_id'] = '1';
        //dd($input);
        Intrest::create($input);
        return redirect()->route('admin.booking-intrests.index')->with('flash_message_success','Booking Intrest added successfully');
    }
    public function edit($id)
    {
        $tournament = Intrest::findOrFail($id);
        return view('admin.booking-intrests.edit', compact('tournament'));
    }
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'full_name' => 'required',
        ], [
            'full_name.required' => 'Full name is required',
        ]);
        $input['full_name'] = $request->full_name;
        $input['is_active'] = $request->status;
        $input['booking_id'] = '1';
        Intrest::where('id',$id)->update($input);
        return redirect()->route('admin.booking-intrests.index')->with('flash_message_success','Booking Intrest updated successfully');
    }
    public function delete($id)
    {
        Intrest::where('id',$id)->delete();
        return redirect()->route('admin.booking-intrests.index')->with('flash_message_success','Booking Intrest deleted successfully');
    }
    
}
