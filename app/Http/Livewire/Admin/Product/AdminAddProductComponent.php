<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use function session;
use function view;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $sort_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status = 'instock';
    public $featured = 0;
    public $quantity;
    public $appointment;
    public $composition;
    public $features;
    public $taking_care;
    public $landing;
    public $drawing;
    public $image;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'sort_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|integer',
            'sale_price' => 'required|integer',
            'sku' => 'required',
            'appointment' => 'required',
            'composition' => 'required',
            'features' => 'required',
            'taking_care' => 'required',
            'landing' => 'required',
            'drawing' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required|integer',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->sort_description = $this->sort_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->sku;
        $product->appointment = $this->appointment;
        $product->composition = $this->composition;
        $product->features = $this->features;
        $product->taking_care = $this->taking_care;
        $product->landing = $this->landing;
        $product->drawing = $this->drawing;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message', 'Товар добавлен');
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.admin.product.admin-add-product-component', compact('categories'));
    }
}
