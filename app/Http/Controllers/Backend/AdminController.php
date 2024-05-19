<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard($locale = 'vi'){
        return view('admin.dashboard')->with('locale',$locale);
    }
    public function login(){
        return view('admin.auth.login');
    }
}
