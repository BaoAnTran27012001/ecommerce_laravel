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
        $products = Product::where('status',1)->get();
        $categories = Category::all();
        return view('frontend.home.home',compact('sliders','products','categories'));
    }
}
