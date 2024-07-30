<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function imageGallery(){
        return $this->hasMany(ProductImage::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function orderDetail(){
        return $this->hasMany(Customer_Order_Detail::class,'product_id');
    }
}
