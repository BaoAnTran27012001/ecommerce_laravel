<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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

        if($request->has('category') && $request->category == 'all'){
            $products = Product::where(['status'=> 1])->paginate(12);
        } elseif($request->has('category')){
            $category = Category::where('id',$request->category)->first();
            $products = Product::where(['status'=> 1,'category_id' =>$category->id])->paginate(12);

            
        }elseif ($request->has('price_from') && $request->has('price_to')){
            
            $products = Product::where(['status'=> 1])->when($request->has('price_from'),function($query) use($request){
                
                $price_from = $request->price_from;
                $convert_price_from = (int) (str_ireplace('.', '', $price_from));
                $price_to = $request->price_to;
                $convert_price_to = (int) (str_ireplace('.', '', $price_to));
                return $query->whereBetween('discount_price',[$convert_price_from,$convert_price_to]);
            })->paginate(12);
        }elseif ($request->has('brand')){
            $brand = Brand::where('id',$request->brand)->first();
            $products = Product::where([
                'status' => 1,
                'brand_id' => $brand->id,
            ])->paginate(12);
        }elseif ($request->has('search')){
            $products = Product::where(function ($query) use ($request){
                $query->where('name','like','%'.$request->search.'%');
            })->paginate(12);
        }
        $categories = Category::where(['status' => 1])->get();
        $brands = Brand::where(['status' => 1])->get();
        return view('frontend.pages.products',compact('products','categories','brands'));
    }
    public function changeListView(Request $request){
        Session::put('product_list_style',$request->style);
    }

}
