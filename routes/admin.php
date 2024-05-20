<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Localization\LocalizationController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('profile/',[ProfileController::class,'index'])->name('profile');
Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class,'updatePassword'])->name('password.update');



// Localization Route
Route::get('locale/{lang}',[LocalizationController::class,'setLang'])->middleware('lang')->name('lang');

?>
