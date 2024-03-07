<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }  
     
    use HasFactory;

    protected $fillable = [
        'name','category_id','image'
    ];
}
