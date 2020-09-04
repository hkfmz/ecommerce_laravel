<?php

use Gloudemans\Shoppingcart\Facades\Cart;
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
    return view('welcome');
});

/** La route des produits */
Route::get('/boutique', 'ProduitController@index')->name('produits.index');
Route::get('/boutique/{slug}', 'ProduitController@show')->name('produits.show');

/* Cart Route */
Route::get('/panier', 'CartController@index')->name('cart.index');
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');

Route::get('/videpanier', function() {
   Cart::destroy();
});

/* checkout routes */

Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');