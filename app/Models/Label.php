<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class,'label_product', 'label_id','product_id')
            ->withPivot(['quantity', 'regular_price', 'sale', 'sale_price']);}

    public function slug(){
        return $this->slug;
    }

}
