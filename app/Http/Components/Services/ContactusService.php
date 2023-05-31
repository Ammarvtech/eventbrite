<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\ContactUsQuery;

class ContactusService
{
    public function getAll()
    {
        return ContactUsQuery::latest()->get();
    }
    public function getById($id)
    {
        return ContactUsQuery::find($id);
    }
    public function getOne($slug)
    {
        return ContactUsQuery::where('slug', $slug)->first();
    }
    public function create($request)
    {
       
    
    }
    public function update($request, $id)
    {
       
    }
    public function delete($id)
    {
        $page = ContactUsQuery::find($id);
        $page->delete();
    }
}