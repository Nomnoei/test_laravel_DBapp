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

Route::resource('Confim','ConfimOrderController');

Route::resource('order','OrderDetailControllerController');

Route::resource('transfer','TransferController');

Route::get('transfer','TransferController@forminsert');

Route::get('showslip','TransferController@showslip');

Route::resource('upslip','TransferController');

Route::get('OrderData','OrderDataController@ShowDataOrder');

Route::get('manage','ManageController@index');

Route::get('manage/{id}','ManageController@show');

Route::get('editamoount','EditAmountController@AddAmount');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clear','ClearController');

Route::get('showimage/{id}','ImageShowController@showimage');

Route::get('Confimslip/{id}','ImageShowController@Confimslip');

Route::get('closeslip/{id}','ImageShowController@closeslip');
