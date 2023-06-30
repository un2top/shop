<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public function increaseQuantity($rowid)
    {
        $product = Cart::instance('cart')->get($rowid);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowid, $qty);
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function decreaseQuantity($rowid)
    {
        $product = Cart::instance('cart')->get($rowid);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowid, $qty);
        $this->emitTo('cart-icon-component','refreshComponent');
    }
    public function destroy($id){
        Cart::instance('cart')->remove($id);
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','Элемент был удален из корзины!');
    }

    public function clearAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
