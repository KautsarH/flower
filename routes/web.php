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
//Auth()->user()->authorizeRoles('customer');
//User
Route::get('/home', 'HomeController@index')->name('home');
Route::put('/home','UserController@updateProfile')->name('users.update');
Route::get('/admin/home', 'UserController@showAdmin')->name('admin.home');
Route::put('admin/home','UserController@editAdmin')->name('admin.edit');
Route::put('admin/home','UserController@updateAdmin')->name('admin.update');


Route::get('/map','DeliveryController@map')->name('delivery.map');
Route::get('/address','DeliveryController@index')->name('delivery.index');
Route::get('address/create','DeliveryController@create')->name('delivery.create');
Route::post('/address','DeliveryController@store')->name('delivery.store');
Route::get('/address/{delivery}','DeliveryController@show')->name('delivery.show');
Route::get('/address/{delivery}/edit','DeliveryController@edit')->name('delivery.edit');
Route::put('/address/{delivery}','DeliveryController@update')->name('delivery.update');
Route::delete('/address/{delivery}','DeliveryController@destroy')->name('delivery.destroy');
    


//Address

//Product
Route::get('/product','ProductController@index')->name('product.index');
Route::get('/cart','ProductController@cart')->name('product.cart');
Route::get('/checkout','ProductController@checkout')->name('product.checkout');
Route::get('/reduce/{$id}','ProductController@getDeleteFromCart')->name('product.reduce');
Route::get('/product/{product}/edit','ProductController@edit')->name('product.edit');
Route::get('/add-to-cart/{product}','ProductController@addToCart')->name('product.addToCart');


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

//----------------------------------------------------------------------------
// //API
Route::get('api/users','ApiController@users');
Route::get('api/deliveries','ApiController@deliveries');
Route::get('api/occasions','ApiController@occasions');
Route::get('api/histories','ApiController@history');
Route::get('api/products','ApiController@products');


//-------------------------------------------------------------------------------------------------
//Admin

//User

Route::get('admin/user','UserController@index')->name('admin.user.index');
Route::get('admin/user/{user}','UserController@show')->name('admin.user.show');
Route::delete('admin/user/{user}','UserController@destroy')->name('admin.user.destroy');

//Occasion
Route::get('admin/occasion','OccasionController@index')->name('admin.occasion.index');
Route::get('admin/occasion/create','OccasionController@create')->name('admin.occasion.create');
Route::post('admin/occasion','OccasionController@store')->name('admin.occasion.store');
Route::get('admin/occasion/{occasion}','OccasionController@show')->name('admin.occasion.show');
Route::get('admin/occasion/{occasion}/edit','OccasionController@edit')->name('admin.occasion.edit');
Route::put('admin/occasion/{occasion}','OccasionController@update')->name('admin.occasion.update');
Route::delete('admin/occasion/{occasion}','OccasionController@destroy')->name('admin.occasion.destroy');

//Product
Route::get('admin/product','ProductController@index')->name('admin.product.index');
Route::get('admin/product/{product}','ProductController@show')->name('admin.product.show');
Route::get('admin/product/{product}/edit','ProductController@edit')->name('admin.product.edit');
Route::put('admin/product/{product}','ProductController@update')->name('admin.product.update');
Route::delete('admin/product/{product}','ProductController@destroy')->name('admin.product.destroy');

//Order
Route::get('admin/order','OrderController@index')->name('admin.order.index');
Route::get('admin/order/{order}','OrderController@show')->name('admin.order.show');
Route::get('admin/order/{order}/edit','OrderController@edit')->name('admin.order.edit');
Route::put('admin/order/{order}','OrderController@update')->name('admin.order.update');
Route::delete('admin/order/{order}','OrderController@destroy')->name('admin.order.destroy');