<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmsController extends Controller
{
    public function contact()
    {
        $contact = DB::table('contact_us_cms')->where('id', 1)->first();
        return view('admin.cms.contact', compact('contact'));
    }
    public function contactSubmit(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads', 'public');
        }else{
            $image = DB::table('contact_us_cms')->where('id', $id)->first()->image;
        }
        DB::table('contact_us_cms')->where('id', $id)->update([
            'title' => $request->title,
            'heading' => $request->heading,
            'description' => $request->description,
            'image' => $image,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
    public function about()
    {
        $about = DB::table('about_us')->where('id', 1)->first();
        return view('admin.cms.about', compact('about'));
    }

    public function aboutSubmit(Request $request){
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('uploads', 'public');
        }else{
            $image = DB::table('about_us')->where('id', 1)->first()->image;
        }
        DB::table('about_us')->where('id', 1)->update([
            'title' => $request->title,
            'heading' => $request->heading,
            'description' => $request->description,
            'image' => $image,
            'btn_text' => $request->btn_text,
            'btn_link' => $request->btn_link,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);
        return redirect()->back()->with('success', 'Your record has been updated successfully.');
    }

}
