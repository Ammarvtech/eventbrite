<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Tournament;
use App\Models\User;
use DB;

class ReviewController extends Controller
{
      public function index()
    {
        $review = Review::with(['tournament','user'])->latest()->paginate(10);
        
        return view('admin.reviews.index',
            [
                'reviews' => $review,
            ]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        $data['tournaments'] = Tournament::get();
        $data['users'] = User::get();
        return view('admin.reviews.create',$data);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'tournament_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
        ], [
            'tournament_id.required' => 'Tournament is required',
            'user_id.required' => 'User is required',
            'rating.required' => 'Rating is required',
        ]);
        $input['tournament_id'] = $request->tournament_id;
        $input['user_id'] = $request->user_id;
        $input['rating'] = $request->rating;
        $input['comment'] = $request->comment;
        //dd($input);
         Review::create($input);
        //DB::table('reviews')->insert($input);
        return redirect()->route('admin.reviews.index')->with('flash_message_success','Review added successfully');
    }
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $tournaments = Tournament::get();
        $users = User::get();
        return view('admin.reviews.edit', compact('review','users','tournaments'));
    }
    public function update(Request $request, $id)
    {
      
       $request->validate([
            'tournament_id' => 'required',
            'user_id' => 'required',
            'rating' => 'required',
        ], [
            'tournament_id.required' => 'Tournament is required',
            'user_id.required' => 'User is required',
            'rating.required' => 'Rating is required',
        ]);
        $input['tournament_id'] = $request->tournament_id;
        $input['user_id'] = $request->user_id;
        $input['rating'] = $request->rating;
        $input['comment'] = $request->comment;
        Review::where('id',$id)->update($input);
        return redirect()->route('admin.reviews.index')->with('flash_message_success','Review updated successfully');
    }
    public function delete($id)
    {
        Review::where('id',$id)->delete();
        return redirect()->route('admin.reviews.index')->with('flash_message_success','Review deleted successfully');
    }
}
