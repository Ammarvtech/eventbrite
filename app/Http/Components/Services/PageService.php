<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Page;

class PageService
{
    public function getAll()
    {
        return Page::latest()->get();
    }
    public function getById($id)
    {
        return Page::find($id);
    }
    public function getOne($slug)
    {
        return Page::where('slug', $slug)->first();
    }
    public function create($request)
    {
        $page = new Page();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        if ($request->hasFile('avatar')) {
            $page->image = $request->file('avatar')->store('uploads', 'public');
        }
        $page->is_active = $request->is_active ? true : false;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->save();
    
    }
    public function update($request, $id)
    {
        $page = Page::find($id);
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->content = $request->content;
        if ($request->hasFile('avatar')) {
            $page->image = $request->file('avatar')->store('uploads', 'public');
        }
        $page->is_active = $request->is_active ? true : false;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->save();
    }
    public function delete($id)
    {
        $page = Page::find($id);
        $page->delete();
    }
}