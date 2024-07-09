<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
}
