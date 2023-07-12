<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Services\Product\HomeProductService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Collection;
use Livewire\Component;

class HomeComponent extends Component
{
    public $hour;
    public $minute;
    public $second;

    protected $shopProductService = 'bootstrap';
    protected $homeProductService;

    public function mount(HomeProductService $productService){
        $this->homeProductService = $productService;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }

    public function productTimer()
    {
        $timeToEnd = strtotime('next day 0:0') - time();

        $this->hours = floor($timeToEnd / 3600);
        $this->minutes = floor(($timeToEnd - $this->hours * 3600) / 60);
        $this->seconds = ($timeToEnd - $this->hours * 3600) - $this->minutes * 60;

        if ($timeToEnd < 0) {
            $this->productTimer();
        } elseif ($timeToEnd == 0) {
            $productDay = Product::where('saleday', 1)->first();
            $productDay->saleday = false;
            $this->oneLimitProduct();
        }
    }

    public function oneLimitProduct()
    {
        if (is_null($this->homeProductService->saleDayProductWithAvg(8))) {
            $limitedProducts = $this->homeProductService->salesProductsWithAvg(8);
            $productDay = $limitedProducts->random();
            $product = Product::find($productDay->id);
            $product->saleday = true;
            $product->save();
        }
    }


    public function render()
    {
        if (!session()->has('last.products')) {
            session()->put('last.products', []);
        }
//        session()->forget('last.products');
        $this->oneLimitProduct();
        $this->productTimer();
        $slides = HomeSlider::where('status', 1)->get();
        $limitedProducts = $this->homeProductService->limitedProductsWithAvg(8);
        $latestProducts = $this->homeProductService->latestProductsWithAvg(8);
        $featuredProducts = $this->homeProductService->featuredProductsWithAvg(8);
        $salesProducts = $this->homeProductService->salesProductsWithAvg(8);
        $popularCategories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(8);
        $oneLimitedProduct = $this->homeProductService->oneLimitedProductWithAvg();


        $viewProducts = new Collection();
        foreach (session()->get('last.products') as $product) {
            $viewProducts->push(Product::where('slug', $product)->first());
        }




//        $products = $this->homeProductService->saleDayProductWithAvg();

//        foreach ($products as $product) {
//            dd($product->name);
//        }
//
//        dd($products);

        return view('livewire.home-component', compact('oneLimitedProduct', 'viewProducts', 'slides', 'latestProducts', 'featuredProducts', 'popularCategories', 'salesProducts', 'limitedProducts'));
    }
}
