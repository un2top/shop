<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Services\Product\ShopProductService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class ShopComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;
    public $orderBy = 'Сначала по отзывам';
    public $min_value = 0;
    public $max_value = 1000;
    protected $paginationTheme = 'bootstrap';


    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Товар добавлен в корзину');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        session()->flash('message', 'Товар добавлен в корзину');
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function addToWitchList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-icon-component', 'refreshComponent');
    }

    public function removeFromWishList($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wish-list-icon-component', 'refreshComponent');
                return;
            }
        }
    }

    public function sortCommentsProductsWithAvg($min, $max)
    {
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

    public function render(ShopProductService $shopProductService)
    {
        $products = [];
        if ($this->orderBy == 'Сначала недорогие') {
            $products = $shopProductService->sotPriceWithAvg($this->min_value, $this->max_value)->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Сначала дорогие') {
            $products = $shopProductService->sotPriceWithAvg($this->min_value, $this->max_value, 'desc')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Сначала новые') {
            $products = $shopProductService->sortCreatedProductsWithAvg($this->min_value, $this->max_value)->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Сначала популярные') {
            $products = $shopProductService->sortSalesProductsWithAvg($this->min_value, $this->max_value)->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Сначала по отзывам') {
            $products = $shopProductService->sortCommentsProductsWithAvg($this->min_value, $this->max_value)->paginate($this->pageSize);
        }
//        } else {
//            $products = $this->sortCommentsProductsWithAvg($this->min_value, $this->max_value)->paginate($this->pageSize);
//        }
//        dd($products);
        $categories = Category::orderBy('name', 'ASC')->get();
        $latestProducts = Product::latestProduct(3);
        return view('livewire.shop-component', compact('products', 'categories', 'latestProducts'));
    }
}
