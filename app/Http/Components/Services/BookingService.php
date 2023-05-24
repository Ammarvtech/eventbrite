<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class BookingService
{
    public function getAll()
    {
        return Booking::latest()->get();
    }
    public function getOne($id)
    {
        return Booking::find($id);
    }
    public function create($request)
    {
        //dd($request->all());
        $booking = new Booking();
        $booking->full_name = $request->full_name;
        $booking->email = $request->email;
        $booking->tournament_title = $request->tournament_title;
        $booking->country_id = $request->country;
        $booking->state = $request->state;
        $booking->city = $request->city;
        $booking->zip_code = $request->zip_code;
        $booking->address = $request->address;
        $booking->description = $request->description;
        $booking->save();
    }
    public function update($request, $id)
    {
        $booking = Booking::find($id);
        $booking->full_name = $request->full_name;
        $booking->email = $request->email;
        $booking->tournament_title = $request->tournament_title;
        $booking->country_id = $request->country;
        $booking->state = $request->state;
        $booking->city = $request->city;
        $booking->zip_code = $request->zip_code;
        $booking->address = $request->address;
        $booking->description = $request->description;
        $booking->save();
    }
    public function delete($id)
    {
        $category = Booking::find($id);
        $category->delete();
    }
}