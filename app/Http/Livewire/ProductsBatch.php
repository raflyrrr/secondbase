<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
class ProductsBatch extends Component
{
    use WithPagination;

    public $search,$batch;

    protected $updateQueryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function mount($batchid){
        $batchDetail = Category::find($batchid);
        if($batchDetail){
            $this->batch = $batchDetail;
        }

    }
    
    public function render()
    {

        if($this->search){
            $products = Product::where('category_id',$this->batch->id)->where('nama','like','%'.$this->search.'%')->paginate(6);
        }else{
            $products = Product::where('category_id',$this->batch->id)->paginate(6);
        }

        return view('livewire.product-index',[
            'products'=>$products,
            'title'=>'List '.$this->batch->nama
        ])
        ;
    }
}
