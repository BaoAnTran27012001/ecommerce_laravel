<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer_Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard($locale = 'vi'){
        $total_order = Customer_Order::count();
        $today_order = Customer_Order::whereDate('date',Carbon::today())->count();
        $total_customer = User::where('role_id',2)->count();
        $total_product = Product::count();
        $total_brand = Brand::count();
        $total_category = Category::count();
        return view('admin.dashboard',compact('total_order','today_order','total_customer','total_product','total_brand','total_category'))->with('locale',$locale);
    }
    public function login(){
        return view('admin.auth.login');
    }
}
