<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public function Product()
    {
        return $this->hasMany(Product::class);
    }
    public function OrderDetails(){
        return $this->hasMany(OrderDetails::class,'order_id','id');
    }
}
