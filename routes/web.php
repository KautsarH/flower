<?php

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

Auth::routes();

//User
Route::get('/home', 'HomeController@index')->name('home');
Route::put('/home','UserController@updateProfile')->name('users.update');

//Address
Route::get('/address','DeliveryController@index')->name('delivery.index');
Route::get('address/create','DeliveryController@create')->name('delivery.create');
Route::post('/address','DeliveryController@store')->name('delivery.store');
Route::get('/address/{delivery}','DeliveryController@show')->name('delivery.show');
Route::get('/address/{delivery}/edit','DeliveryController@edit')->name('delivery.edit');
Route::put('/address/{delivery}','DeliveryController@update')->name('delivery.update');
Route::delete('/address/{delivery}','DeliveryController@destroy')->name('delivery.destroy');

//Product
Route::get('/product','ProductController@index')->name('product.index');
//Route::get('/product/{product}','ProductController@show')->name('product.show');
Route::get('/product/{product}/edit','ProductController@edit')->name('product.edit');
Route::get('/add-to-cart/{product}','ProductController@addToCart')->name('product.addToCart');
Route::get('/cart','ProductController@cart')->name('product.cart');

// Route::put('/product/{product}','ProductController@update')->name('product.update');
// Route::get('/product/create','ProductController@create')->name('product.create');
// Route::post('/product','ProductController@store')->name('product.store');
// Route::delete('/product/{product}','ProductController@destroy')->name('product.destroy');

//order
Route::get('/order','OrderController@index')->name('order.index');
Route::get('/order/create','OrderController@create')->name('order.create');
Route::post('/order','OrderController@store')->name('order.store');
Route::get('/order/{order}/edit','OrderController@edit')->name('order.edit');
Route::get('/order/{order}','OrderController@show')->name('order.show');
Route::put('/order/{order}','OrderController@update')->name('order.update');
Route::delete('/order/{order}','OrderController@destroy')->name('order.destroy');

//History
Route::get('/history','OrderProductController@index')->name('history.index');
Route::get('/history/{history}','OrderProductController@show')->name('history.show');


// //API
Route::get('api/users','ApiController@users');
Route::get('api/deliveries','ApiController@deliveries');
Route::get('api/occasions','ApiController@occasions');
Route::get('api/histories','ApiController@history');
Route::get('api/products','ApiController@products');

