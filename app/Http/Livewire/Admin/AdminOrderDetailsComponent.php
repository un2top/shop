<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;
    public $status;
    public $paymentmode;
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $town;
    public $postIndex;
    public $telephone;
    public $subtotal;


    public function mount($order_id){
        $this->order_id = $order_id;
        $order = Order::find($order_id);

        $this->firstName = $order->firstName;
        $this->lastName = $order->lastName;
        $this->email = $order->email;
        $this->address = $order->address;
        $this->town = $order->town;
        $this->postIndex = $order->postIndex;
        $this->telephone = $order->telephone;
        $this->subtotal = $order->subtotal;
        $this->status = $order->status;
        $this->paymentmode = $order->paymentmode;
    }

    public function updateOrder(){

        $order = Order::find($this->order_id);
        $order->firstName = $this->firstName;
        $order->lastName = $this->lastName;
        $order->email = $this->email;
        $order->address = $this->address;
        $order->town = $this->town;
        $order->postIndex = $this->postIndex;
        $order->telephone = $this->telephone;
        $order->status = $this->status;
        if($this->status == 'delivered'){
            $order->delivered_date = DB::raw('CURRENT_DATE');
        } elseif ($this->status == 'canceled'){
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message', 'Статус изменен');
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.admin.admin-order-details-component', compact('order' ));
    }
}
