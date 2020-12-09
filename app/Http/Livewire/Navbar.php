<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Pesanan;
use Auth;
use App\Models\PesananDetail;
class Navbar extends Component
{
    public $jumlah = 0;

    protected $listeners = [
        'masukKeranjang'=>'updateKeranjang'
    ];

    public function updateKeranjang(){
        if(Auth::user()){
            $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
            if($pesanan){
                $this->jumlah = PesananDetail::where('pesanan_id',$pesanan->id)->count();
        }else{
            $this->jumlah = 0;
        }
        }
    }

    public function mount()
    {
        if(Auth::user()){
            $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
            if($pesanan){
             $this->jumlah = PesananDetail::where('pesanan_id',$pesanan->id)->count();
        }else{
            $this->jumlah = 0;
        }
        }
    }

    public function render()
    {
        return view('livewire.navbar',[
            'categories'=>Category::All(),
            'jumlah_pesanan'=>$this->jumlah
        ]);
    }
}
