<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Faq;

class FaqService
{
    public function getAll()
    {
        return Faq::latest()->get();
    }
    public function getOne($id)
    {
        return Faq::find($id);
    }
    public function create($request)
    {
        //dd($request->all());
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->is_active = $request->status;
        $faq->meta_title = $request->meta_title;
        $faq->meta_description = $request->meta_description;
        $faq->meta_keywords = $request->meta_keywords;
        $faq->save();
    }
    public function update($request, $id)
    {
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->is_active = $request->status;
        $faq->meta_title = $request->meta_title;
        $faq->meta_description = $request->meta_description;
        $faq->meta_keywords = $request->meta_keywords;
        $faq->save();
    }
    public function delete($id)
    {
        $category = Faq::find($id);
        $category->delete();
    }
}