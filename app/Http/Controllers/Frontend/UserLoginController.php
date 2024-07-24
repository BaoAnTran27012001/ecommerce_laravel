<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserLoginController extends Controller
{
    public function userLoginPage(){
        return view('auth.login');
    }
    public function userLogin(Request $request){

       $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email không tồn tại.',
        ])->onlyInput('email');
    }
    public function userLogout(Request $request):RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function userRegister(Request $request):RedirectResponse{
        $request->validate([
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required'],
            'cf_password' => ['required'],
        ]);
        if($request->password != $request->cf_password){
            return redirect()->back()->withErrors(['password' => 'Mật Khẩu Không Khớp'])->withInput();
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);

        Auth::login($user);

        return redirect()->route('home')
        ->with('message', 'Đăng Ký Thành Công');;
    }
}
