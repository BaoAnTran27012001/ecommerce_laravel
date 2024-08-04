<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status',1)->orderBy('order','asc')->get();
        $products = Product::where('status',1)->paginate(6);
        $women_products = Product::where('status',1)->where('category_id',7)->get();
        $clothings = Product::where('status',1)->where('category_id',8)->orWhere('category_id',2)->get();
        $categories = Category::all();
        return view('frontend.home.home',compact('sliders','products','categories','women_products','clothings'));
    }
}
