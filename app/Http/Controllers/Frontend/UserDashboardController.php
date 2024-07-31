<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer_Order;
use App\Models\WishList;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(){
        $total_order = Customer_Order::where('user_id',Auth::user()->id)->count();
        $total_wishlist = WishList::where('user_id',Auth::user()->id)->count();
        return view('frontend.dashboard.dashboard',compact('total_order','total_wishlist'));
    }
}
