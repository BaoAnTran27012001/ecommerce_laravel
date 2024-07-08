<?php
use App\Http\Controllers\Backend\SupplierController;
use Illuminate\Support\Facades\Route;
Route::get('dashboard',[SupplierController::class,'dashboard'])->name('dashboard');
?>
