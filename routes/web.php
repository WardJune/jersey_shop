<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::livewire('/', 'home')->name('home');
Route::livewire('/product', 'product.index')->name('product.index');
Route::livewire('/product/liga/{slug}', 'product.liga')->name('product.liga');
Route::livewire('/product/{id}', 'product.detail')->name('product.detail');
Route::livewire('/cart', 'cart')->name('cart.index')->middleware('auth');
