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

Route::get('/', function () {

    return view('frontend.home');
});

Route::auth();

Route::get('/dashboard', 'Backend\DashboardController@index');
Route::get('/products/add', 'Backend\ProductController@add');