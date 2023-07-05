<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutComponent extends Component
{
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $town;
    public $postIndex;
    public $telephone;
    public $paymentmode;
    public $thankyou;

    public function placeOrder()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'town' => 'required',
            'postIndex' => 'required|numeric',
            'telephone' => 'required|numeric',
            'paymentmode' => 'required',
        ]);

        $order = new Order();
        if (Auth::user()) {
            $order->user_id = Auth::user()->id;
        } else {
            $order->user_id = null;
        }
        $order->subtotal = str_replace(',','', session()->get('checkout')['total']);
        $order->firstName = $this->firstName;
        $order->lastName = $this->lastName;
        $order->email = $this->email;
        $order->address = $this->address;
        $order->town = $this->town;
        $order->postIndex = $this->postIndex;
        $order->telephone = $this->telephone;
        $order->status = 'ordered';
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($this->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = $order->user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if ($this->thankyou) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('shop');
        }
    }


    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component');
    }
}
