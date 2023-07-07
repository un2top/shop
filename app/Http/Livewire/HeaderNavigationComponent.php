<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderNavigationComponent extends Component
{
    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.header-navigation-component', compact('categories'));
    }
}
