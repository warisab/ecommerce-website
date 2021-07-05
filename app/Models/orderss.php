<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class orderss extends Model
{
    use HasFactory;
    public function customerss(){
        return $this->belongsTo(customerss::class);
    }
    public function shippingss(){
        return $this->belongsTo(shippingss::class);
    }
    public function order_det(){
        return $this->hasMany(order_det::class);
    }
}
