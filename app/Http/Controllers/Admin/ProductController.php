<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Components\Services\ProductService;
use App\Http\Components\Services\CategoryService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $Product;

    private $categoryService;

    public function __construct(ProductService $productService,CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;;


    }
    public function index()
    {
       
        return view('admin.products.index', [
            'products' => $this->productService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         return view('admin.products.create',['categories' => $this->categoryService->getAll()]);
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
            'product_name' => 'required',
        ], [
            'product_name.required' => 'Name is required',
        ]);
      
        $this->productService->create($request);
        return redirect()->route('admin.products.index')->with('flash_message_success','Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('admin.products.edit', [
        'product' => $this->productService->getOne($id)
        ,'categories' => $this->categoryService->getAll()]);
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
            'product_name' => 'required',
        ], [
            'product_name.required' => 'Name is required',
        ]);
        $this->productService->update($request, $id);

        return redirect()->route('admin.products.index')->with('flash_message_success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect()->route('admin.products.index')->with('flash_message_success','Product deleted successfully');
    }
}
