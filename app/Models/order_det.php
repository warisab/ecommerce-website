<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_det extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasMany(products::class, 'products_id', 'product_id');
    }

 public function orderss(){
        return $this->hasMany(orderss::class);
    }
}
