<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer_Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard($locale = 'vi'){
        $total_order = Customer_Order::count();
        return view('admin.dashboard',compact('total_order'))->with('locale',$locale);
    }
    public function login(){
        return view('admin.auth.login');
    }
}
