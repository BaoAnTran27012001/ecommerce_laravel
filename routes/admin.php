<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Localization\LocalizationController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('profile/',[ProfileController::class,'index'])->name('profile');
Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class,'updatePassword'])->name('password.update');

// Slider Controller
Route::resource('slider', SliderController::class);
// Role Controller
Route::resource('role', RoleController::class);
// Localization Route
Route::get('locale/{lang}',[LocalizationController::class,'setLang'])->middleware('lang')->name('lang');


//Slider Status


// Category Routes
Route::put('change-status',[CategoryController::class,'changeStatus'])->name('category-change-status');
Route::resource('category', CategoryController::class);


// Brand Routes
Route::put('brand/change-status',[BrandController::class,'changeStatus'])->name('brand-change-status');
Route::resource('brand', BrandController::class);
?>
