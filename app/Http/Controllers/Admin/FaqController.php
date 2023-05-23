<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\FaqService;

class FaqController extends Controller
{
    private $categoryService;
    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.faq.index', [
            'faqs' => $this->faqService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'question' => 'required',
        ], [
            'question.required' => 'Question is required',
        ]);
        $this->faqService->create($request);
        return redirect()->route('admin.faq.index')->with('flash_message_success','Faq added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.faq.show', [
            'category' => $this->faqService->getOne($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.faq.edit', [
            'faq' => $this->faqService->getOne($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
        ], [
            'question.required' => 'Name is required',
        ]);
        $this->faqService->update($request, $id);

        return redirect()->route('admin.faq.index')->with('flash_message_success','Faq updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    
        $this->faqService->delete($id);
        return redirect()->route('admin.faq.index')->with('flash_message_success','Faq deleted successfully');
    }
}
