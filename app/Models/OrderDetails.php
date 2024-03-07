<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetails extends Model
{
    use HasFactory;
    public function Order(){
        return $this->belongsTo(Order::class);

    }
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
