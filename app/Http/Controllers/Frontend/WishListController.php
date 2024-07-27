<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index(){
        $wishlistProducts = WishList::with('product')->where('user_id',Auth::user()->id)->get();
        return view('frontend.pages.wishlist',compact('wishlistProducts'));
    }
    public function addToWishList(Request $request){
        if(Auth::check()){
            $wishlistCount = WishList::where(['product_id'=>$request->id,'user_id'=>Auth::user()->id])->count();
            if($wishlistCount > 0){
                return response(['status'=>'error','message'=>'Sản Phẩm Đã Có Trong Danh Sách Yêu Thích']) ;
            }else{
                $wishlist = new WishList();
                $wishlist->product_id = $request->id;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->save();
                $count = WishList::where('user_id',Auth::user()->id)->count();
                return response(['status'=>'success','message'=>'Thêm Sản Phẩm Vào Danh Sách Yêu Thích Thành Công','count'=>$count]) ;
            }
        }else{
            return response(['status'=>'error','message'=> 'Xin Hãy Đăng Nhập']);
        }

    }
    public function removeFromWishList(String $id){
        $wishlistProducts = WishList::where('id',$id)->firstOrFail();
        $wishlistProducts->delete();
        return redirect()->back();
    }
}
