<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\EventCategoryService;

class EventCategoryController extends Controller
{
    private $categoryService;
    public function __construct(EventCategoryService $eventcategoryService)
    {
        $this->eventcategoryService = $eventcategoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.event-categories.index', [
            'categories' => $this->eventcategoryService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event-categories.create');
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
            'category_name' => 'required',
        ], [
            'category_name.required' => 'Name is required',
        ]);
        $this->eventcategoryService->create($request);
        return redirect()->route('admin.event-categories.index')->with('flash_message_success','Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.event-categories.show', [
            'category' => $this->eventcategoryService->getOne($id),
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
        return view('admin.event-categories.edit', [
            'category' => $this->eventcategoryService->getOne($id)]);
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
            'category_name' => 'required',
        ], [
            'category_name.required' => 'Name is required',
        ]);
        $this->eventcategoryService->update($request, $id);

        return redirect()->route('admin.event-categories.index')->with('flash_message_success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    
        $this->eventcategoryService->delete($id);
        return redirect()->route('admin.event-categories.index')->with('flash_message_success','Category deleted successfully');
    }
}
