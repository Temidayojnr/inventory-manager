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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes(['register' => false]);

Route::get('/','InventoryController@dashboard');

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/add', 'InventoryController@createProductPage')->name('addProductPage');

Route::post('/add-product', 'InventoryController@addProduct')->name('AddProduct');

Route::get('/products', 'InventoryController@products')->name('Products');

Route::get('/edit-product/{id}', 'InventoryController@edit_product')->name('EditProduct');

Route::post('/update-product/{id}', 'InventoryController@updateProduct')->name('UpdateProduct');

Route::get('/product/{id}', 'InventoryController@deleteInventory')->name('DeleteProduct');