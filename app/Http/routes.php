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

// Entrust
use \App\Role;
use \App\Permission;

Route::controller('auth', 'Auth\AuthController', [
	'getLogin' => 'auth.login',
	'getLogout' => 'auth.logout'
]);


Route::get('/', function () {

    return view('frontend.home');
});




/*===============================
=            Backend            =
===============================*/

Route::get('/dashboard', ['as'=>'dashboard', 'uses' => 'Backend\DashboardController@index']);


// Products
Route::get('/products', ['as'=>'products', 'uses' => 'Backend\ProductController@all']);
Route::get('/products/add', ['as'=>'products.add', 'uses' => 'Backend\ProductController@add']);
// Route::controller('/products', 'Backend\ProductController', [
// 	'add' => 'products.add',
// 	'all' => 'products'
// ]);


/*=====  End of Backend  ======*/


