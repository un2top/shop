<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }


    public function labels(){
        return $this->belongsToMany(Label::class, 'label_product', 'product_id','label_id')
            ->withPivot(['quantity', 'regular_price', 'sale', 'sale_price']);
    }

    public static function latestProduct($col)
    {
        return Product::orderBy('created_at', 'DESC')->get()->take($col);
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'product_slug');
    }

    public function averageRegularPrice()
    {
        return round($this->labels()->avg('regular_price'));
    }


//    public function avgSale()
//    {
//        return round($this->labels()->avg('sale'));
//    }
//    public function averageSalePrice()
//    {
//        return round($this->labels()->avg('sale_price'));
//    }
//
//    public function averageSalePrice()
//    {
//        return $this->labels()->where('sale', 1)->avg('sale_price');
//    }



}
