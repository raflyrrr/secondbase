<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->Belongsto(Category::Class, 'category_id','id');
    }

    public function pesanan_details(){
        return $this->hasMany(PesananDetails::class, 'product_id', 'id');
    }
}
