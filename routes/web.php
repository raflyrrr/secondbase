<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
'verify'=>false,
'reset'=>false]);

Route::livewire('/', 'home')->name('home');
Route::livewire('/products','product-index')->name('products');
Route::livewire('/products/batch/{batchid}','products-batch')->name('products.batch');
Route::livewire('/products/{id}','products-detail')->name('products.detail');
Route::livewire('/keranjang','keranjang')->name('keranjang');
Route::livewire('/checkout','checkout')->name('checkout');
Route::livewire('/history','history')->name('history');
// Route::get('/', \App\Http\Livewire\Home::class)->name('home');
// Route::get('/products', \App\Http\Livewire\ProductIndex::class)->name('products');
// Route::get('/products/batch{batchid}', \App\Http\Livewire\ProductsBatch::class)->name('products.batch');
// Route::get('/products/{id}', \App\Http\Livewire\ProductsDetail::class)->name('products.detail');
// Route::get('/keranjang', \App\Http\Livewire\Keranjang::class)->name('keranjang');
// Route::get('/checkout', \App\Http\Livewire\Checkout::class)->name('checkout');
// Route::get('/history', \App\Http\Livewire\History::class)->name('history');