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

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $product_id;
    public $name;
    public $slug;
    public $sort_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $appointment;
    public $composition;
    public $features;
    public $taking_care;
    public $landing;
    public $drawing;
    public $stock_status = 'instock';
    public $featured = 0;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->sort_description = $product->sort_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale = $product->sale;
        $this->appointment = $product->appointment;
        $this->composition = $product->composition;
        $this->features = $product->features;
        $this->taking_care = $product->taking_care;
        $this->landing = $product->landing;
        $this->drawing = $product->drawing;
        $this->sku = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'sort_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            'sale' => 'required',
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
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->sort_description = $this->sort_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale = $this->sale;
        $product->appointment = $this->appointment;
        $product->composition = $this->composition;
        $product->features = $this->features;
        $product->taking_care = $this->taking_care;
        $product->landing = $this->landing;
        $product->drawing = $this->drawing;
        $product->SKU = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;

        if ($this->newimage)
        {
            unlink('assets/imgs/products/' . $product->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message', 'Товар обнавлен');
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.admin.product.admin-edit-product-component', compact('categories'));
    }
}
