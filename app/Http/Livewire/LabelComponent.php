<?php

namespace App\Http\Livewire;

use App\Models\Label;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class LabelComponent extends Component
{
    use WithPagination;

    public $slug;
    protected $paginationTheme = 'bootstrap';


    public function mount($slug){
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Товар добавлен в корзину');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        session()->flash('message', 'Товар добавлен в корзину');
    }

    public function render()
    {
        $label = Label::where('slug', $this->slug)->first();
        $products = Product::where('label_id', $label->id)->orderBy('regular_price', 'ASC')->paginate(10);
        return view('livewire.label-component', compact('label', 'products'));
    }
}
