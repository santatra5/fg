<?php

use App\Http\Controllers\PaypalController;
use App\Http\Livewire\shoppingcart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomizeProductsController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/shoppingcart', Shoppingcart::class)->name('shoppingcart');

Route::get('payment-cancel', [PaypalController::class, 'cancel'])
    ->name('payment.cancel');
Route::get('payment-success', [PaypalController::class, 'success'])
    ->name('payment.success');
//modification des produits
Route::get('customize-products',[CustomizeProductsController::class,'index']);
//produit admin
Route::prefix('products')->group(function(){
    //afficher la liste des produits
    Route::get('/',[ProductController::class,'index'])->name('product.index');
    //Ajouter des produits
    Route::get('create',[ProductController::class,'create'])->name('product.create');
    Route::post('store',[ProductController::class,'store'])->name('product.store');
    Route::get('destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::get('edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('update/{id}',[ProductController::class,'update'])->name('product.update');
});
