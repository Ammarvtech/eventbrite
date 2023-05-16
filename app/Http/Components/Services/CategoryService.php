<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryService
{
    public function getAll()
    {
        return Category::latest()->get();
    }
    public function getOne($id)
    {
        return Category::find($id);
    }
    public function create($request)
    {
        //dd($request->all());
        $category = new Category();
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

        if($request->category == null){
            $category->parent_id = null;
        }
        else{
            $category->parent_id = $request->category;
        }
         // Upload Product IMG
        if (!is_null($request->avatar)) {
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('images/categories'), $imageName);
            // Get the base URL of your Laravel application
            $baseUrl = url('/');
            // Add the base URL to the image filename
            $imageUrl = $baseUrl.'/images/categories/'.$imageName;
            
            // Save the image URL to the database
            $category->image = $imageUrl;
            
        }
        $category->save();
    }
    public function update($request, $id)
    {
        $category = Category::find($id);
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
        if($request->category == null){
            $category->parent_id = null;
        }
        else{
            $category->parent_id = $request->category;
        }
        // Upload Product IMG
        if (!is_null($request->avatar)) {
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('images/categories'), $imageName);
             // Get the base URL of your Laravel application
            $baseUrl = url('/');
            // Add the base URL to the image filename
            $imageUrl = $baseUrl.'/images/categories/'.$imageName;
            
            // Save the image URL to the database
            $category->image = $imageUrl;
            
        }
        $category->save();
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}