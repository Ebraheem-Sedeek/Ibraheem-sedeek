<?php

use App\Http\Controllers\Creat\CreatController;
use App\Http\Controllers\Products\ProductController;
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

Route::get('/', function () {
    return view('dashbourd');
});


Route::get('Allproduct/All',[ProductController ::class, 'index'])->name('Allproduct.index');
Route::get('products/creat',[ProductController ::class, 'creat'])->name('product.creat');
Route::get('products/{id}/edit',[ProductController ::class, 'edit'])->name('Allproduct.edit');
Route::post('products/store', [ProductController ::class, 'store'])->name('product.store');
Route::put('products/{id}/update', [ProductController ::class, 'update'])->name('product.update');
Route::delete('products/{id}/delete',[ProductController ::class, 'delete'])->name('product.delete');



