<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\EventCategory;

class EventCategoryService
{
    public function getAll()
    {
        return EventCategory::latest()->get();
    }
    public function getOne($id)
    {
        return EventCategory::find($id);
    }
    public function create($request)
    {
        //dd($request->all());
        $category = new EventCategory();
        $category->name = $request->category_name;
        $slug = $request->category_name;
        $slug = str_replace(' ', '-', $slug);
        $category->slug = $slug;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->created_by = Auth::user()->id;
         // Upload Product IMG
        if (!is_null($request->avatar)) {
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('images/event-categories'), $imageName);
            // Get the base URL of your Laravel application
            $baseUrl = url('/');
            // Add the base URL to the image filename
            $imageUrl = $baseUrl.'/images/event-categories/'.$imageName;
            
            // Save the image URL to the database
            $category->image = $imageUrl;
            
        }
        $category->save();
    }
    public function update($request, $id)
    {
        $category = EventCategory::find($id);
        $category->name = $request->category_name;
        $slug = $request->category_name;
        $slug = str_replace(' ', '-', $slug);
        $category->slug = $slug;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->created_by = Auth::user()->id;
        // Upload Product IMG
        if (!is_null($request->avatar)) {
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('images/event-categories'), $imageName);
             // Get the base URL of your Laravel application
            $baseUrl = url('/');
            // Add the base URL to the image filename
            $imageUrl = $baseUrl.'/images/event-categories/'.$imageName;
            
            // Save the image URL to the database
            $category->image = $imageUrl;
            
        }
        $category->save();
    }
    public function delete($id)
    {
        $category = EventCategory::find($id);
        $category->delete();
    }
}