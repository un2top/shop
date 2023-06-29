<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;


class SearchComponent extends Component
{
    use WithPagination;

    public $pageSize = 12;
    public $orderBy = 'По умолчанию';

    public $q;
    public $search_term;

    public function mount(){
        $this->fill(request()->only('q'));
        $this->search_term = '%'.$this->q.'%';
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Товар добавлен в корзину');
        return redirect()->route('shop.cart');
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;

    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function render()
    {
        if ($this->orderBy == 'Сначала недорогие') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Сначала дорогие') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Сначала новые') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        } else {
            $products = Product::where('name', 'like', $this->search_term)->paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.search-component', compact('products', 'categories'));
    }
}
