<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;


class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name' => ['required','max:50'],
            'email' => ['required','email','unique:users,email,'.Auth::user()->id],
        ]);
        $user = Auth::user();
        $user->username = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->success('Cập Nhật Hồ Sơ Thành Công.');
        return redirect()->back();


    }
    // Update Password
    public function updatePassword(Request $request){
        $request->validate([
            'current_password' =>['required','current_password'],
            'password'=>['required','confirmed','min:3'],
        ]);
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        toastr()->success('Cập Nhật Mật Khẩu Thành Công.');
        return redirect()->back();
    }
}
