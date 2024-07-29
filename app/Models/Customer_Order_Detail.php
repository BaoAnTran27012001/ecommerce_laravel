<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Order_Detail extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'order_detail_id';
    use HasFactory;
}
