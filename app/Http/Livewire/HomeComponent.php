<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Collection;
use Livewire\Component;

class HomeComponent extends Component
{
    public $hour;
    public $minute;
    public $second;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }

    public function productTimer(){
        $timeToEnd = strtotime('next day 0:0')-time();

        $this->hours = floor($timeToEnd/3600);
        $this->minutes = floor(($timeToEnd - $this->hours*3600)/60);
        $this->seconds = ($timeToEnd - $this->hours*3600)-$this->minutes*60;

        if($timeToEnd<0){
            $this->productTimer();
        } elseif ($timeToEnd==0){
            $limitedProducts = Product::orderBy('quantity', 'ASC')->get()->take(8);
            $productDay = $limitedProducts->random();
            $productDay->saleday=true;
            $productDay->save();
        }

    }


    public function render()
    {
        if (!session()->has('last.products')) {
            session()->put('last.products', []);
        }
        $this->productTimer();
        $slides = HomeSlider::where('status', 1)->get();
        $latestProducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $limitedProducts = Product::orderBy('quantity', 'ASC')->get()->take(8);
        $oneLimitedProduct = Product::where('saleday', 1)->first();
        $featuredProducts = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        $salesProducts = Product::where('sale', '!=', 0)->inRandomOrder()->get()->take(8);
        $popularCategories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(8);

        $viewProducts = new Collection();
        foreach (session()->get('last.products') as $product) {
            $viewProducts->push(Product::where('slug', $product)->first());
        }
        return view('livewire.home-component', compact('oneLimitedProduct','viewProducts','slides', 'latestProducts', 'featuredProducts', 'popularCategories', 'salesProducts', 'limitedProducts'));
    }
}
