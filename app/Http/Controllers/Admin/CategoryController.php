<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.categories.index', [
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create',['categories' => $this->categoryService->getAll()]);
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
        $this->categoryService->create($request);
        return redirect()->route('admin.categories.index')->with('flash_message_success','Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.categories.show', [
            'category' => $this->categoryService->getOne($id),
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
        return view('admin.categories.edit', [
            'category' => $this->categoryService->getOne($id),
        'categories' => $this->categoryService->getAll()]);
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
        $this->categoryService->update($request, $id);

        return redirect()->route('admin.categories.index')->with('flash_message_success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    
        $this->categoryService->delete($id);
        return redirect()->route('admin.categories.index')->with('flash_message_success','Category deleted successfully');
    }
}
