<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class HomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }
    public function render()
    {
        $slides = HomeSlider::where('status',1)->get();
        $latestProducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $featuredProducts = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        $salesProducts = Product::where('sale','!=', 0)->inRandomOrder()->get()->take(8);
        $popularCategories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(8);

        return view('livewire.home-component', compact('slides', 'latestProducts', 'featuredProducts', 'popularCategories', 'salesProducts'));
    }
}
