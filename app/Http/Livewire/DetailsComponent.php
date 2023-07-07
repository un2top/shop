<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug, $comment;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function addToWitchList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-icon-component', 'refreshComponent');
    }

    public function storeComment($user_id)
    {
        $this->validate([
            'comment' => 'required|max:150',
        ]);
        $comment = new Comment();
        $comment->content = $this->comment;
        $comment->product_slug = $this->slug;
        $comment->user_id = $user_id;
        $comment->save();
        session()->flash('message', 'Комментарий был добавлен');
        return redirect(request()->header('Referer'));
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


    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Товар добавлен в корзину');
        $this->emitTo('cart-icon-component', 'refreshComponent');
    }

    public function render()
    {

        $lastView = Session::get('last.products');
        if (count(session()->get('last.products')) > 20) {
            unset($lastView[0]);
            $lastView = array_values($lastView);
            Session::put('last.products', $lastView);
        }
        if (!in_array($this->slug, session()->get('last.products'))) {
            session()->push('last.products', $this->slug);
        }

        $comments = Comment::where('product_slug', $this->slug)->limit(10)->get();
        $product = Product::where('slug', $this->slug)->first();
        $relatedProducts = Product::where('category_id', $product->category_id)->limit(4)->get();
        $nproducts = Product::Latest()->take(4)->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.details-component', compact('product', 'relatedProducts', 'nproducts', 'categories', 'comments'));
    }
}
