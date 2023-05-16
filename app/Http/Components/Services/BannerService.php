<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Banner;

class BannerService
{
    public function getAll()
    {

        return Banner::latest()->get();
    }
    public function getOne($id)
    {
        return Banner::find($id);
    }
    public function create($request)
    {

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->description = $request->description;
         if (!is_null($request->avatar)) {
            $file = $request->avatar;
            $imageName = time().'.'.$file->extension();
            $file->move(public_path('images/banners'), $imageName);
            // Get the base URL of your Laravel application
            $baseUrl = url('/'); 
            // Add the base URL to the image filename
            $imageUrl = $baseUrl.'/images/banners/'.$imageName;
            // Save the image URL to the database
            $banner->image  = $imageUrl;
        }

        $banner->save();
    }
    public function update($request, $id)
    {
        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->description = $request->description;
         if (!is_null($request->avatar)) {
            $file = $request->avatar;
            $imageName = time().'.'.$file->extension();
            $file->move(public_path('images/banners'), $imageName);
            // Get the base URL of your Laravel application
            $baseUrl = url('/'); 
            // Add the base URL to the image filename
            $imageUrl = $baseUrl.'/images/banners/'.$imageName;
            // Save the image URL to the database
            $banner->image  = $imageUrl;
        }
        $banner->save();
    }
    public function delete($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
    }
}