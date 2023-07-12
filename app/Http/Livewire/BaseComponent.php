<?php

namespace App\Http\Livewire;

use App\Services\Product\HomeProductService;
use App\Services\Product\ShopProductService;
use Livewire\Component;

class BaseComponent extends Component
{
    protected $homeProductService, $shopProductService;

    public function mount(HomeProductService $productService, ShopProductService $shopProductService){
        $this->homeProductService = $productService;
        $this->shopProductService = $shopProductService;
    }
}
