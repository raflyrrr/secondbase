<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home',[
        'products'=>Product::take(4)->get(),
        'categories'=>Category::latest('id')->get()
        ]);
        
    }
}
