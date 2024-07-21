<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\GoogleLogin\GoogleLoginController;
use App\Http\Controllers\Localization\LocalizationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');



Route::group(['prefix'=>'user','as'=>'user.'],function(){
    Route::get('dashboard',[UserDashboardController::class,'index'])->name('dashboard');
    Route::get('profile',[UserProfileController::class,'index'])->name('profile');
    Route::put('profile',[UserProfileController::class,'updateProfile'])->name('profile.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('auth/google',[GoogleLoginController::class,'googlepage'])->name('google.login');
Route::get('auth/google/callback',[GoogleLoginController::class,'googlecallback'])->name('google.callback');


// Product Detail route

Route::get('product-detail/{id}',[FrontendProductController::class,'showProduct'])->name('product-detail');


// Set Language For User
Route::get('locale/{lang}',[LocalizationController::class,'setLang'])->middleware('lang')->name('lang');

// Add to Cart Route

Route::post('add-to-cart', [CartController::class,'addToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class,'cartDetails'])->name('cart-details');
Route::get('clear-cart', [CartController::class,'clearCart'])->name('clear.cart');
Route::get('cart/remove-product/{id}', [CartController::class,'removeProduct'])->name('cart.remove-product');
Route::get('cart-count', [CartController::class,'getCartCount'])->name('cart-count');
Route::get('cart-products', [CartController::class,'getCartProducts'])->name('cart-products');
Route::post('cart/remove-sidebar-product', [CartController::class,'removeSidebarProduct'])->name('cart.remvoe-sidebar-product');
Route::get('cart/sidebar-product-total', [CartController::class,'cartTotal'])->name('cart.sidebar-product-total');
Route::post('cart/update-quantity', [CartController::class,'updateProductQuantity'])->name('cart.update-quantity');
