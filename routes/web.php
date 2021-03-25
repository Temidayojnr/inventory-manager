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

Route::get('/chart', 'InventoryController@chart');

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/add', 'InventoryController@createProductPage')->name('addProductPage');

Route::post('/add-product', 'InventoryController@addProduct')->name('AddProduct');

Route::get('/products', 'InventoryController@products')->name('Products');

Route::get('/edit-product/{id}', 'InventoryController@edit_product')->name('EditProduct');

Route::post('/update-product/{id}', 'InventoryController@updateProduct')->name('UpdateProduct');

Route::get('/products/{id}', 'InventoryController@deleteInventory')->name('DeleteProduct');

Route::get('/orders', 'OrderController@index')->name('Orders');

Route::get('/create-order', 'OrderController@create')->name('create');

Route::post('/add-order', 'OrderController@createOrder')->name('CreateOrder');

Route::get('/purchase', 'PurchaseController@index')->name('AllPurhcase');

Route::get('/delete-order/{id}', 'OrderController@softDeleteOrder')->name('DeleteOrder');

Route::get('/purchase/create', 'PurchaseController@create')->name('createPurchasePage');

Route::post('/purchase/add', 'PurchaseController@purchase')->name('AddPurchase');

Route::get('/purchase/edit/{id}', 'PurchaseController@edit_purchase')->name('editPurchase');

Route::post('/purchase/update/{id}', 'PurchaseController@update_purchase')->name('UpdatePurchase');

Route::get('/purchase/delete/{id}', 'PurchaseController@delete_purchase')->name('deletePurchase');

Route::get('/users', 'HomeController@users')->name('Users');

Route::post('/add-user', 'HomeController@add_user')->name('AddUser');

Route::post('/change-status', 'InventoryController@InventoryStatus')->name('ChangeStatus');

Route::get('/delete-user/{id}', 'HomeController@deleteUser')->name('DeleteUser');

Route::get('/reports', 'ReportController@index');

Route::post('/reports/fetch_data', 'ReportController@fetch_data')->name('FetchData');

Route::get('/get_department/{id}', 'HomeController@get_by_college')->name('getCollege');
