<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use Auth;
class History extends Component
{
    public $pesanans;
    public function render()
    {   
        if(Auth::user()){
        $this->pesanans = Pesanan::where('user_id',Auth::user()->id)->where('status','!=',0)->get();
        
        }
        return view('livewire.history');
    }
}
