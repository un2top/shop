<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use function session;
use function view;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $is_popular = 0;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'image'=> 'required',
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image'=> 'required',
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('categories', $imageName);
        $category->image = $imageName;
        $category->is_popular = $this->is_popular;
        $category->save();
        session()->flash('message', 'Категория была успешно создана');
    }

    public function render()
    {
        return view('livewire.admin.category.admin-add-category-component');
    }
}