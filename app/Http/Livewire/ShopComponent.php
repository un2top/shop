<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;


class ShopComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;
    public $orderBy = 'По умолчанию';
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

    public function render()
    {
        if ($this->orderBy == 'Сначала недорогие') {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Сначала дорогие') {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Сначала новые') {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('created_at', 'DESC')->paginate($this->pageSize);
//        }
//        elseif ($this->orderBy == 'Сначала популярные') {
//            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])
//            ->whereRelation('comments', 'comments')->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        } else {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        $latestProducts = Product::latestProduct(3);
        return view('livewire.shop-component', compact('products', 'categories', 'latestProducts'));
    }
}
