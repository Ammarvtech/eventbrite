<?php

namespace App\Http\Components\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductImage;
use Image;


class ProductService
{
    public function getAll()
    {
        return Product::with('product_images')->latest()->get();
    }
    public function getOne($id)
    {
        return Product::with('product_images')->find($id);
    }
    public function create($request)
    {

        $product = new Product();
        $productImg = new ProductImage();
        $product->name = $request->product_name;
        $slug = $request->product_name;
        $slug = str_replace(' ', '-', $slug);
        $product->slug = $slug;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->status = $request->status;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->created_by = Auth::user()->id;
        $product->save();
        // Upload Product IMG
        if (!is_null($request->avatar)) {
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('images/products'), $imageName);
            // Get the base URL of your Laravel application
            $baseUrl = url('/');
            // Add the base URL to the image filename
            $imageUrl = $baseUrl.'/images/products/'.$imageName;
            // Save the image URL to the database
            $productImg->image = $imageUrl;
            $productImg->status = 'active';
            $productImg->product_id = $product->id;
            $productImg->created_by = Auth::user()->id;
            $productImg->save();
        }
    }
    public function update($request, $id)
{
    $product = Product::find($id);
    $product->name = $request->product_name;
    $slug = $request->product_name;
    $slug = str_replace(' ', '-', $slug);
    $product->slug = $slug;
    $product->description = $request->description;
    $product->category_id = $request->category;
    $product->status = $request->status;
    $product->meta_title = $request->meta_title;
    $product->meta_description = $request->meta_description;
    $product->meta_keywords = $request->meta_keywords;
    $product->created_by = Auth::user()->id;
    $product->save();

    // Upload Product IMG
    if (!is_null($request->avatar)) {
        $imageName = time().'.'.$request->avatar->extension();
        $request->avatar->move(public_path('images/products'), $imageName);
        // Get the base URL of your Laravel application
        $baseUrl = url('/');
        // Add the base URL to the image filename
        $imageUrl = $baseUrl.'/images/products/'.$imageName;
        // Update or create the ProductImage record
        $productImg = [
            'image' => $imageUrl,
            'status' => 'active',
            'created_by' => Auth::user()->id,
            'product_id' =>$id,
        ];
        ProductImage::updateOrCreate(['product_id' => $id], $productImg);
    }
}
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}