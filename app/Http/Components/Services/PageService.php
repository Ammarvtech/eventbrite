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
    public function getOne($slug)
    {
        return Page::where('slug', $slug)->first();
    }
    public function create($request)
    {

        $page = new Page();
        $page->title = $request->title;
        $page->description = $request->description;
        $page->slug = $request->slug;
        $page->save();
    }
    public function update($request, $id)
    {
        $page = Page::find($id);
        $page->title = $request->title;
        $page->description = $request->description;
        $page->slug = $request->slug;
        $page->save();
    }
    public function delete($id)
    {
        $page = Page::find($id);
        $page->delete();
    }
}