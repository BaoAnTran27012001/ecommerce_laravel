<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer_Order;
use App\Models\Customer_Order_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.pages.checkout');
    }
    public function checkoutSuccess(){
        return view('frontend.pages.order_success');
    }
    public function store(Request $request){
        $request->validate(
            ['name'=>['required'],'email'=>['required','email'],'phone'=>['required'],'address'=>['required']]
        );
        $customer_order = new Customer_Order();
        $customer_order->invoice_no = rand(1,999999);
        $customer_order->user_id = Auth::user()->id;
        $customer_order->name = $request->name;
        $customer_order->email = $request->email;
        $customer_order->phone = $request->phone;
        $customer_order->address = $request->address;
        $customer_order->save();

        // Store Order Detail

        foreach(\Cart::content() as $product){
            $customer_order_detail = new Customer_Order_Detail();
            $customer_order_detail->order_id = $customer_order->id;
            $customer_order_detail->product_id = $product->id;
            $customer_order_detail->quantity = $product->qty;
            $customer_order_detail->unit_price = $product->price;
            $customer_order_detail->amount = $product->qty * $product->price;
            $customer_order_detail->save();
        }
        $this->clearCart();
        return redirect()->route('checkout.success');
    }
    public function clearCart(){
        \Cart::destroy();
    }
}
