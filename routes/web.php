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
    return view('main');
});

Route::resource('product','ProductController');

Route::resource('select','ShowProductController');

Route::resource('categorie','CategoriesController');

Route::resource('admin','AdminController');

Route::resource('addtocart','AddToCartController');

Route::get('editamoount','EditAmountController@AddAmount');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
