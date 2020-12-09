<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_pesanan',
        'product_id',
        'pesanan_id',
        'total_harga'
    ];

    public function pesanan(){
        return $this->belongsto(Pesanan::class, 'pesanan_id', 'id');
    }
    public function product(){
        return $this->belongsto(Product::class, 'product_id', 'id');
    }
}
