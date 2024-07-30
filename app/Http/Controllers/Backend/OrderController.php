<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer_Order;
use App\Models\Customer_Order_Detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Customer_Order::all();
        return view('admin.order.index',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     */
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
        return view('admin.order.detail',compact('order','order_detail','total','billTotal'));
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
        //
    }
}
