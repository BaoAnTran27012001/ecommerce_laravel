<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function supplier(){
        return $this->belongsTo(User::class,'user_id');
    }
}
