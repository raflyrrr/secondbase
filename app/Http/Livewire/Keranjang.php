<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use App\Models\PesananDetail;
Use Auth;
class Keranjang extends Component
{
    protected $pesanan;
    protected $pesanan_details=[];

    public function destroy($id){

        $pesanan_detail = PesananDetail::find($id);
        if(!empty($pesanan_detail)){
            $pesanan = Pesanan::Where('id',$pesanan_detail->pesanan_id)->first();
            $jumlah_pesanan_detail = PesananDetail::where('pesanan_id',$pesanan->id)->count();
            if($jumlah_pesanan_detail ==1){
                $pesanan->delete();
            }else{
                $pesanan->total_harga = $pesanan->total_harga-$pesanan_detail->total_harga;
                $pesanan->update();
            }
            
        }
            $pesanan_detail->delete();

            $this->emit('masukKeranjang');
    }


    public function render()
    {

        if(Auth::user()){
        
            $this->pesanan = Pesanan::Where('user_id',Auth::user()->id)->where('status',0)->first();
            if($this->pesanan){
                $this->pesanan_details = PesananDetail::Where('pesanan_id',$this->pesanan->id)->get();
            }

        }

        
        return view('livewire.keranjang',[
            'pesanan'=> $this->pesanan,
            'pesanan_details'=>$this->pesanan_details
            ]);
    }
}
