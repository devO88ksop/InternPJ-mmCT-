<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

    public function purchaseOrders(){ 
        return $this->hasMany(PurchaseOrder::class);
    }

    use HasFactory;

    protected $fillable = [
        'name', 'subcategory_id', 'price', 'description', 'image'
    ];
}
