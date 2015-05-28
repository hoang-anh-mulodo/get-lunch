<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FoodsController@index');

// Route::get('home', 'HomeController@index');
Route::get('foods/create','FoodsController@create');
Route::post('foods','FoodsController@store');
Route::get('foods/{id}/edit','FoodsController@edit');
Route::post('foods/{id}/update','FoodsController@update');

Route::get('orders','DetailOrdersController@index');
Route::post('orders/{food_id}','OrdersController@store');
Route::delete('orders/{detail_orders_id}/{user_id}','DetailOrdersController@destroy');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
