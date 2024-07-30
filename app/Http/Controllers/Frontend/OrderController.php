<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer_Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $fe_customer_orders = Customer_Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.dashboard.order.index',compact('fe_customer_orders'));
    }
    public function show(string $id)
    {
        $order = Customer_Order::findOrFail($id);
        $order_detail = Customer_Order::find($id)->orderDetail;
        $total = 0;
        $billTotal = 0;
        foreach($order_detail as $item){
            $total += $item->unit_price * $item->quantity;
        }
        $billTotal += $total + 10000;
        return view('frontend.dashboard.order.show',compact('order','order_detail','total','billTotal'));
    }
}
