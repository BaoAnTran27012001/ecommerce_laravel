<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseOrderDetail;
use Illuminate\Http\Request;

class PurchaseOrderDetailController extends Controller
{
    public function storePurchaseItem(Request $request){
        $request->validate([
            'product_select' =>['required'],
            'purchase_quantity' => ['required'],
            'unit_price' =>['required']
        ]);
        $product_get = Product::findOrFail($request->product_select);
        $product_get->inventory_quantity =  $product_get->inventory_quantity + $request->purchase_quantity;
        $product_get->save();
        $convert_purchase_price = (int) (str_ireplace('.', '', $request->unit_price));
        $purchase_order_detail = new PurchaseOrderDetail();
        $purchase_order_detail->purchase_order_id = $request->purchase_order_id;
        $purchase_order_detail->product_id = $request->product_select;
        $purchase_order_detail->purchased_quantity = $request->purchase_quantity;
        $purchase_order_detail->unit_price = $convert_purchase_price;
        $purchase_order_detail->amount = $convert_purchase_price * $request->purchase_quantity;
        $purchase_order_detail->save();
        return redirect()->back();
    }
}
