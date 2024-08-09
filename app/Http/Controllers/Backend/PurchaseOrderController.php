<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchase_orders = PurchaseOrder::all();
        return view('admin.purchase.index',compact('purchase_orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = User::where('role_id',3)->get();

        return view('admin.purchase.create',compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            "supplier_choose"=>['required'],
            "purchase_no"=>['required'],
            "employee"=>['required'],
            "city"=>['required'],
            "phone"=>['required'],
            "address"=>['required'],
            "active_choose"=>['required'],

        ]);
        $purchase_order = new PurchaseOrder();
        $purchase_order->invoice_no = $request->purchase_no;
        $purchase_order->user_id = $request->supplier_choose;
        $purchase_order->status = $request->active_choose;
        $purchase_order->supplier_name = $request->employee;
        $purchase_order->supplier_city = $request->city;
        $purchase_order->phone = $request->phone;
        $purchase_order->address = $request->address;
        $purchase_order->save();
        toastr('Tạo Đơn Mua Thành Công');
        return redirect()->route('admin.purchase.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::all();
        $puchase_order_detail = PurchaseOrderDetail::where('purchase_order_id',$id)->get();
        $purchase_id = $id;
        return view('admin.purchase.detail',compact('products','purchase_id','puchase_order_detail'));
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
