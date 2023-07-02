<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use function session;
use function view;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $product_id;

    public function deleteProduct(){
        $product = Product::find($this->product_id);
        unlink('assets/imgs/products/'.$product->image);
        $product->delete();
        session()->flash('message', 'Товар был удален!');
    }
    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.product.admin-product-component', compact('products'));
    }
}
