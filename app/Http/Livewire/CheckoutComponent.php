<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
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
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

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

        if ($this->paymentmode == 'card') {
            $this->validate([
                'card_no' => 'required',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',

            ]);
        }

        $order = new Order();
        if (Auth::user()) {
            $order->user_id = Auth::user()->id;
        } else {
            $order->user_id = null;
        }
        $order->subtotal = str_replace(',', '', session()->get('checkout')['total']);
        $order->firstName = $this->firstName;
        $order->lastName = $this->lastName;
        $order->email = $this->email;
        $order->address = $this->address;
        $order->town = $this->town;
        $order->postIndex = $this->postIndex;
        $order->telephone = $this->telephone;
        $order->status = 'ordered';
        $order->paymentmode = $this->paymentmode;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($this->paymentmode == 'cod' || $this->paymentmode == 'codcard') {
            $this->makeTransaction($order->id, 'pending', $order->user_id);
            $this->resetCart();
        } elseif ($this->paymentmode == 'card') {
            $stripe = Stripe::make(env('STRIPE_KEY'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => 'pm_card_visa',
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc
                    ]
                ]);
                if (!isset($token['id'])) {
                    session()->flash('stripe_error', 'Токен не сгенерирован');
                    $this->thankyou = 0;
                }
                $customer = $stripe->customers()->create([
                    'name' => $this->firstName . ' ' . $this->lastName,
                    'email' => $this->email,
                    'phone' => $this->telephone,
                    'address' => [
                        'address' => $this->address,
                        'postal_code' => $this->postIndex,
                        'city' => $this->town
                    ]
                ]);
                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Платеж за заказ' . $order->id
                ]);
                if ($charge['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'pending', $order->user_id);
                    $this->resetCart();
                } else {
                    session()->flash('stripe_error', 'Ошибка транзакции');
                    $this->thankyou = 0;
                }
            } catch (\Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->thankyou = 0;
            }
        }
    }

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id, $status, $user_id)
    {
        $transaction = new Transaction();
        $transaction->user_id = $user_id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
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
