<?php

namespace App\Http\Livewire\Admin\HomeSlide;

use App\Models\HomeSlider;
use Livewire\Component;
use function session;
use function view;

class AdminHomeSliderComponent extends Component
{
    public $slide_id;
    public function deleteSlide(){
        $slide = HomeSlider::find($this->slide_id);
        unlink('assets/imgs/slider/'.$slide->image);
        $slide->delete();
        session()->flash('message', 'Слайд был удален');
    }

    public function render()
    {
        $slides = HomeSlider::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.homeslide.admin-home-slider-component', compact('slides'));
    }
}
