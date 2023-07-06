<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDashboardComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-dashboard-component', compact('orders'));
    }
}
