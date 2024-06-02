<?php

namespace App\Http\Controllers\GoogleLogin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class GoogleLoginController extends Controller
{
    public function googlepage(){
        return Socialite::driver('google')->redirect();
    }
    public function googlecallback(){
        $timestamp = Carbon::now()->toDateTimeString();
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();

            if($finduser && $finduser->role == "user")

            {

                Auth::login($finduser);

                return redirect()->intended('user/dashboard');

            }
            else if($finduser && $finduser->role == "admin"){
                dd($finduser);
                return redirect()->intended('/');
            }
            else

            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'email_verified_at' => $timestamp,
                    'role' => 'user'
                ]);

                Auth::login($newUser);
                return redirect()->intended('user/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
