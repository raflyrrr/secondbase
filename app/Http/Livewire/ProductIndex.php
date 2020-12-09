<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
class ProductIndex extends Component
{
    use WithPagination;

    public $search;

    protected $updateQueryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {

        if($this->search){
            $products = Product::where('nama','like','%'.$this->search.'%')->paginate(6);
        }else{
            $products = Product::paginate(6);
        }

        return view('livewire.product-index',[
            'products'=>$products,
            'title'=>'List Batch'
        ])
        ;
    }
}
