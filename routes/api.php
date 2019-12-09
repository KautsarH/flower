<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/register', 'AuthController@register')->name('registerform');
// Route::post('/login', 'AuthController@login')->name('login1');
// Route::get('/login', 'AuthController@showlogin')->name('loginform');
// Route::put('/home','UserController@updateProfile')->name('users.update');


// //API
// Route::get('/users','UserController@api');
