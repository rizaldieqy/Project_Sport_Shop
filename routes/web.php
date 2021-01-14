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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'LandingPageController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/shop/detail/{id}', 'ShopController@show')->name('show');
Route::get('/shop/category/{id}', 'ShopController@category')->name('category');
Route::get('/cart', 'Cart_ViewController@index')->name('cart');
// Route::get('/cart','Cart_ViewController@create');
Route::post('/cart/store','Cart_ViewController@store');
// Route::post('/cart/store', 'CartController@store')->name('store');
Route::patch('/cart/{id}', 'Cart_ViewController@update')->name('update');
Route::delete('/cart/{id}', 'Cart_ViewController@destroy')->name('destroy');

Route::post('/checkout/store', 'CheckoutController@store')->name('store');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::prefix('/admin')->group(function(){
    Route::get('/cartadmin','CartController@index');
    Route::delete('/cartadmin/{id}','CartController@destroy')->name('destroy');
    Route::resource('productadmin','ProductController');
    Route::resource('categoryadmin','CategoryController');
    Route::resource('sizeadmin','SizeController');
    Route::resource('galleryadmin','GalleryController');
    Route::resource('transactionadmin','TransactionController');
});
