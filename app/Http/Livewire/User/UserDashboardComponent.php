<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserDashboardComponent extends Component
{
    public $userName;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function changeName(){
        $user = User::find(Auth::user()->id);
        $user->name = $this->userName;
        $user->save();
        session()->flash('message', 'Имя обновлено');
    }

    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(10);
        return view('livewire.user.user-dashboard-component', compact('orders'));
    }
}
