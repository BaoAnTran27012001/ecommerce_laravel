<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\ImageUploadTraits;
use Illuminate\Http\Request;

class ProductImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTraits;
    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product);
        $product_images = ProductImage::where(['product_id'=> $product->id])->get();
        return view('admin.product.image-gallery.index',compact('product','product_images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' =>['required','image','max:2048'],
        ]);
        $imagePaths = $this->uploadMultiImage($request,'image','uploads');
        foreach($imagePaths as $path){
            $productImageGallery = new ProductImage();
            $productImageGallery->image_path = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage = ProductImage::findOrFail($id);
        $this->deleteImage($productImage->image_path);
        $productImage->delete();
        return response(['status' =>'success','message'=>'Xoá Thành Công !']);
    }
}
