<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Order extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function user(){
       return $this->belongsTo(User::class);
    }
    public function orderDetail(){
       return $this->hasMany(Customer_Order_Detail::class,'order_id');
    }
}
