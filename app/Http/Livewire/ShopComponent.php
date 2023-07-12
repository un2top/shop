<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Services\Product\ShopProductService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;


class ShopComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;
    public $orderBy = 'Сначала по отзывам';
    public $min_value = 0;
    public $max_value = 1000;
    public $isSales = false;
    public $label;
    public $prodMaterials = [];
    public $isSort = false;
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

    public function parametrSort(ShopProductService $shopProductService)
    {
        $this->isSort = true;
        return $shopProductService
            ->parametrSort($this->min_value, $this->max_value, $this->isSales, $this->label, $this->prodMaterials)->paginate($this->pageSize);
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
        if($this->isSort){
            $products = $this->parametrSort($shopProductService);
            $this->isSort = false;
        }


        $labels = $shopProductService->labeslName();
        $materials = $shopProductService->materialName();

        $categories = Category::orderBy('name', 'ASC')->get();
        $latestProducts = Product::latestProduct(3);
        return view('livewire.shop-component', compact('products', 'categories', 'latestProducts', 'labels', 'materials'));
    }
}
