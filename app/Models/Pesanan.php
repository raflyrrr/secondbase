<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pemesanan',
        'status',
        'user_id',
        'total_harga'


    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function pesanan_details(){
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }
}
