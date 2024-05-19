<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\App;

class ProfileController extends Controller
{
    public function index($locale ='vi'){
        App::setLocale($locale);
        return view('admin.profile.index')->with('locale',$locale);
    }
    public function updateProfile(Request $request){
        $request->validate([
            'name' => ['required','max:50'],
            'email' => ['required','email','unique:users,email,'.Auth::user()->id],
            'image' => ['image','max:2048']
        ]);
        $user = Auth::user();
        if($request->hasFile('image')){
           if(File::exists(public_path($user->image))){
            File::delete(public_path($user->image));
           }
            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'),$imageName);
            $path = "/uploads/".$imageName;
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->success('Profile Updated Successfully.');
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
        toastr()->success('Profile Password Updated Successfully.');
        return redirect()->back();
    }
}
