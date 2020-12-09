<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'nama' => 'sb5',
            'category_id' => 1,
            'gambar' => 'sb1.jpg',
            'harga'=>25000
        ]);
        DB::table('products')->insert([
        	'nama' => 'sb6',
            'category_id' => 1,
            'gambar' => 'sb2.jpg',
            'harga'=>45000
        ]);
        DB::table('products')->insert([
        	'nama' => 'sb7',
            'category_id' => 1,
            'gambar' => 'sb3.jpg',
            'harga'=>35000
        ]);
        DB::table('products')->insert([
        	'nama' => 'sb8',
            'category_id' => 1,
            'gambar' => 'sb4.jpg',
            'harga'=>55000
        ]);
    }
}
