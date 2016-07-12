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

Route::auth();

// Home page
Route::get('/', ['as'=>'home', 'uses'=>'Frontend\FrontendController@home']);

// Get customer detail via ajax to fill form
Route::post('/customer/get', 'Frontend\FrontendController@getCustomerByPhone');





// Dashboard
Route::get('dashboard', ['as'=>'dashboard', 'uses'=>'Backend\DashboardController@index']);

// Products
Route::get('products/{product}/confirm', ['as'=>'products.confirm', 'uses'=>'Backend\ProductsController@confirm']);
Route::get('products/{product}/change', ['as'=>'products.change', 'uses'=>'Backend\ProductsController@change']);
Route::resource('products', 'Backend\ProductsController');



// Verb    Path                        Action  Route Name
// GET     /users                      index   users.index
// GET     /users/create               create  users.create
// POST    /users                      store   users.store
// GET     /users/{user}               show    users.show
// GET     /users/{user}/edit          edit    users.edit
// PUT     /users/{user}               update  users.update
// DELETE  /users/{user}               destroy users.destroy