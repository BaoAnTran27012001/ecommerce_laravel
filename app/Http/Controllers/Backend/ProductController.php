<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\ImageUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTraits;
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => ['required','image','max:3000'],
            'name' => ['required','max:200'],
            'category' =>['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'discount_price' => ['required'],
            'inventory_quantity' => ['required'],
            'input_quantity' => ['required'],
            'output_quantity' => ['required'],
            'description' => ['required'],
            'status' => ['required']
        ]);
        $convert_price = (int) (str_ireplace('.', '', $request->price));
        $convert_discount_price = (int) (str_ireplace('.', '', $request->discount_price));
        $imagePath = $this->uploadImage($request,'image','uploads');
        $product = new Product();
        $product->name = $request->name;
        $product->thumb_image = $imagePath;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->price = $convert_price;
        $product->discount_price = $convert_discount_price;
        $product->inventory_quantity = $request->inventory_quantity;
        $product->input_quantity = $request->input_quantity;
        $product->output_quantity = $request->output_quantity;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();
        toastr('Tạo Sản Phẩm Thành Công');
        return redirect()->route('admin.products.index');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.edit',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable','image','max:3000'],
            'name' => ['required','max:200'],
            'category' =>['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'discount_price' => ['required'],
            'inventory_quantity' => ['required'],
            'input_quantity' => ['required'],
            'output_quantity' => ['required'],
            'description' => ['required'],
            'status' => ['required']
        ]);
        $convert_price = (int) (str_ireplace('.', '', $request->price));
        $convert_discount_price = (int) (str_ireplace('.', '', $request->discount_price));
        $product = Product::findOrFail($id);
        $imagePath = $this->updateImage($request,'image','uploads',$product->thumb_image);

        $product->name = $request->name;
        $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->price = $convert_price;
        $product->discount_price = $convert_discount_price;
        $product->inventory_quantity = $request->inventory_quantity;
        $product->input_quantity = $request->input_quantity;
        $product->output_quantity = $request->output_quantity;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();
        toastr('Cập Nhật Sản Phẩm Thành Công');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = DB::select('call GetProductByID(?)',[$id]);

        $product_id = null;
        foreach ($product as $product_key) {
            $product_id = $product_key->id;
            $this->deleteImage($product_key->thumb_image);
            Product::where('id',$product_id)->delete();
        }
        $productImages = DB::select('call GetAssocImage(?)',[$product_id]);
        foreach($productImages as $element){
            $this->deleteImage($element->image_path);
            ProductImage::where('id',$element->id)->delete();
        }

        return response(["status"=>"success","message"=>"Xoá Thành Công"]);
    }
    public function spGetProducts(Request $request){
        $request->headers->set('Accept', 'application/json');
        $products = DB::select('call GetProducts()');
        return response()->json([
            "status" => 200,
            "message" => "Success",
            "data" => $products
        ]);
    }
}
