<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'nama' => 'Batch 6',
        	'gambar' => 'batch6.jpg',
        ]);

        DB::table('categories')->insert([
        	'nama' => 'Batch 7',
        	'gambar' => 'batch7.jpg',
        ]);

        DB::table('categories')->insert([
        	'nama' => 'Batch 8',
        	'gambar' => 'batch8.jpg',
        ]);
        DB::table('categories')->insert([
        	'nama' => 'Batch 9',
        	'gambar' => 'batch7.jpg',
        ]);
    }
}
