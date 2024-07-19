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
        $cartData['price'] = $product->discount_price ? $product->discount_price:$product->price;
        $cartData['options']['image'] = $product->thumb_image;
        Cart::add($cartData);
        return response(['status' => 'success','message'=>'Thêm giỏ hàng thành công']);
    }
    // Show Cart Page
    public function cartDetails(){
        $cartItems = Cart::content();
        return view('frontend.pages.cart',compact('cartItems'));
    }
    public function updateProductQuantity(Request $request){
        Cart::update($request->rowId,$request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);
        return response(['status'=>'success','message'=>'Cập Nhật Số Lượng Thành Công','product_total'=> number_format($productTotal, 0, ',', '.') . 'đ']);
    }

    public function getProductTotal(String $rowId){
        $product = Cart::get($rowId);
        $total = $product->price * $product->qty;
        return $total;
    }
}
