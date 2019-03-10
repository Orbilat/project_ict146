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
    return view('auth.login');
});
//Auth routes
Auth::routes();
//Home route
Route::get('/home', 'HomeController@index')->name('home');
//Redirect route
Route::redirect('/admin', '/admin/home');
//Admin routes
Route::get('/admin/home', 'AdminController@admin')->name('admin')->middleware('auth');
Route::get('/admin/samples', 'AdminController@samples')->name('samples')->middleware('auth');
Route::get('/admin/clients', 'AdminController@clients')->name('clients')->middleware('auth');
Route::get('/admin/accounts', 'AdminController@accounts')->name('accounts')->middleware('auth');
Route::post('/admin/accounts', 'AdminController@addAccount')->name('addAccount')->middleware('auth');
//Inventory routes
Route::get('/admin/inventory/chemicals', 'AdminController@chemicals')->name('inventory-chemicals')->middleware('auth');
Route::get('/admin/inventory/glassware', 'AdminController@glassware')->name('inventory-glassware')->middleware('auth');