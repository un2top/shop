<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\DB;

class HomeProductService
{
    public function limitedProductsWithAvg($count){
       return DB::table('products')
           ->join('label_product', 'products.id', '=', 'label_product.product_id')
           ->join('labels', 'label_product.label_id', '=', 'labels.id')
           ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
               'products.image as image', 'products.id as id',
               DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'),
               DB::raw('SUM(label_product.quantity) as quantity'))
           ->groupBy('products.name')
           ->orderBy('quantity')
           ->take($count)
           ->get();
    }
    public function latestProductsWithAvg($count){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
                'products.image as image', 'products.id as id',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'))
            ->groupBy('products.name')
            ->orderBy('products.created_at', 'desc')
            ->take($count)
            ->get();
    }

    public function featuredProductsWithAvg($count){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
                'products.image as image', 'products.id as id',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'))
            ->where('products.featured',  1)
            ->groupBy('products.name')
            ->where('products.saleday',  '!=',1)
            ->take($count)
            ->get();
    }
    public function salesProductsWithAvg($count){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
                'products.image as image', 'products.id as id',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'))
            ->where('products.sale','>',  0)
            ->groupBy('products.name')
            ->where('products.saleday',  '!=',1)
            ->orderBy('products.sale', 'desc')
            ->take($count)
            ->get();
    }
    public function oneLimitedProductWithAvg(){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
                'products.image as image', 'products.id as id',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'))
            ->where('products.sale','>',  0)
            ->groupBy('products.name')
            ->first();
    }
    public function saleDayProductWithAvg(){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
                'products.image as image', 'products.id as id',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'))
            ->where('products.saleday',1)
            ->groupBy('products.name')
            ->first();
    }
}
