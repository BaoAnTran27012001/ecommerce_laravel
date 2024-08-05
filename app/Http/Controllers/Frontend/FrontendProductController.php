<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Session;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    // Show product detail page
    public function showProduct(string $id){
        $product = Product::where('id',$id)->where('status',1)->first();
        $category_id = $product->category_id;
        $related_products = Product::where('category_id',$category_id);
        return view('frontend.pages.product-detail',compact('product','related_products'));
    }
    public function productIndex(Request $request){
        if($request->has('category')){
            $category = Category::where('id',$request->category)->first();
            $products = Product::where(['status'=> 1,'category_id' =>$category->id])->paginate(12);
        }else{
            $products = Product::where(['status'=> 1])->when($request->has('price'),function($query) use($request){
                $price_get = $request->price;
                $convert_price = (int) (str_ireplace('.', '', $price_get));
                return $query->where('discount_price','=',$convert_price)->orWhere('price','=',$convert_price);
            })->paginate(12);
        }
        $categories = Category::where(['status' => 1])->get();
        return view('frontend.pages.products',compact('products','categories'));
    }
    public function changeListView(Request $request){
        Session::put('product_list_style',$request->style);
    }
    public function getProductsByPrice(Request $request){
        $request->validate([
            "price" => ['required']
        ]);
        $price_get = $request->price;
        $convert_price = (int) (str_ireplace('.', '', $price_get));
        $filter_products = Product::where('discount_price',$convert_price)->orWhere('price',$convert_price)->get();
        dd($request->all());
    }
}
