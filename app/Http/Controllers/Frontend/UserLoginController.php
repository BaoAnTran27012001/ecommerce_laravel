<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserLoginController extends Controller
{
    public function userLoginPage(){
        return view('auth.login');
    }
    public function userLogin(Request $request){

        $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('/');
            } else {
                return back()->with('fail','Mật khẩu không khớp!');
            }
        } else {
            return back()->with('fail','Email chưa được đăng ký.');
        }
    }
    public function userLogout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }
}
