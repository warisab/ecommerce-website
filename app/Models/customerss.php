<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerss extends Model
{
    use HasFactory;
    public function orderss(){
        return $this->hasMany(orderss::class);
    }
}
