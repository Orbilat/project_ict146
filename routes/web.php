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

Route::get('barcode','ProduitController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/secretary', 'SecretaryController@index')->name('secretary');
Route::get('/secretary/notification', 'SecretaryController@noti')->name('notification');
Route::get('/secretary/inventory', 'SecretaryController@inve')->name('inventory');
Route::get('/secretary/view', 'SecretaryController@stat')->name('view');
Route::get('/secretary/add', 'SecretaryController@add')->name('add');
Route::get('/secretary/create','SecretaryController@create')->name('create');
