<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Auth;

class ProductsDetail extends Component
{

    public $product,$jumlah_pesanan ;

    public function mount($id){
        $productDetail = Product::find($id);
        if($productDetail){
            $this->product = $productDetail;
        }

    }

    public function masukkanKeranjang(){
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);

        if(!Auth::user()){
            return redirect()->route('login');
        }

        $total_harga = $this->jumlah_pesanan * $this->product->harga;

        $pesanan= Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();

            
        if(empty($pesanan)){
        
        Pesanan::Create([
                    'user_id'=>Auth::user()->id,
                    'total_harga'=>$total_harga,
                    'status'=>0
                ]);
                $pesanan= Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
                $pesanan->kode_pemesanan = 'SB-'.$pesanan->id;
                $pesanan->update();
        }else{
            $pesanan->total_harga = $pesanan->total_harga+$total_harga;
            $pesanan->update();
        }
        PesananDetail::create([
                    'product_id'=>$this->product->id,
                    'jumlah_pesanan'=>$this->jumlah_pesanan,
                    'pesanan_id'=>$pesanan->id,
                    'total_harga'=>$total_harga
                    ]);

        $this->emit('masukKeranjang');
        session()->flash('message','Sukses Masuk Keranjang');

        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.products-detail')
        ;
    }
}
