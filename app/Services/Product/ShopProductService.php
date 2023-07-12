<?php

namespace App\Services\Product;

use Illuminate\Support\Facades\DB;

class ShopProductService
{

    public function sotPriceWithAvg($min, $max, $order = 'asc'){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
                'products.image as image', 'products.id as id', 'products.sort_description as sort_description',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'))
            ->groupBy('products.name')
            ->havingRaw('sred_price BETWEEN ? AND ?', [$min, $max])
            ->orderBy('sred_price', $order);
    }
    public function sortCreatedProductsWithAvg($min, $max){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
                'products.image as image', 'products.id as id', 'products.sort_description as sort_description',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'))
            ->groupBy('products.name')
            ->havingRaw('sred_price BETWEEN ? AND ?', [$min, $max])
            ->orderBy('products.created_at', 'desc');
    }
    public function sortCountCommentsProductsWithAvg($min, $max){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->leftJoin('comments', 'products.slug', '=', 'comments.product_slug') // Добавляем объединение с таблицей комментариев
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug', 'products.image as image', 'products.id as id',
                'products.sort_description as sort_description',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'),
                DB::raw('COUNT(comments.id) as comment_count'))
            ->groupBy('products.name')
            ->havingRaw('sred_price BETWEEN ? AND ?', [$min, $max])
            ->orderBy('comment_count', 'desc');
    }

    public function sortSalesProductsWithAvg($min, $max){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->join('order_items', 'order_items.product_id', '=', 'products.id')
            ->select('products.name as name', 'products.sale as sale', 'products.slug as slug',
                'products.image as image', 'products.id as id', 'products.sort_description as sort_description',
                DB::raw('ROUND(AVG(label_product.regular_price),1) as sred_price'),
                DB::raw('SUM(DISTINCT order_items.quantity) as total_quantity'))
                ->groupBy('products.id')
            ->havingRaw('sred_price BETWEEN ? AND ?', [$min, $max])
            ->orderBy('total_quantity', 'desc');
    }

    public function sortCommentsProductsWithAvg($min, $max){
        return DB::table('products')
            ->join('label_product', 'products.id', '=', 'label_product.product_id')
            ->join('labels', 'label_product.label_id', '=', 'labels.id')
            ->select(
                'products.name as name',
                'products.sale as sale',
                'products.sort_description as sort_description',
                'products.slug as slug',
                'products.image as image',
                'products.id as id',
                DB::raw('ROUND(AVG(label_product.regular_price), 1) as sred_price'),
                DB::raw('(SELECT COUNT(*) FROM comments WHERE comments.product_id = products.id) as comments_quantity')
            )
            ->groupBy('products.id')
            ->havingRaw('sred_price BETWEEN ? AND ?', [$min, $max])
            ->orderBy('comments_quantity', 'desc');

    }

}
