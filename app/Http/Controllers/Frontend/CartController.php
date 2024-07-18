<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::findOrFail($request->product_id);
        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['weight'] = 0;
        $cartData['price'] = $product->discount_price ? $product->discount_price * $request->qty:$product->price* $request->qty;
        $cartData['options']['image'] = $product->thumb_image;
        Cart::add($cartData);
        return response(['status' => 'success','message'=>'Thêm giỏ hàng thành công']);
    }
}
