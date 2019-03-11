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
Route::get('/secretary', 'SecretaryController@index')->name('secretary');
Route::get('/notification', 'SecretaryController@noti')->name('notification');
//Redirect route
Route::redirect('/admin', '/admin/home');
//Middleware for User Content Control
Route::middleware(['admin','auth'])->group(function (){
    //Admin routes
    Route::get('/admin/home', 'AdminController@admin')->name('admin');
    Route::get('/admin/samples', 'AdminController@samples')->name('samples');
    Route::get('/admin/clients', 'AdminController@clients')->name('clients');
    Route::get('/admin/accounts', 'AdminController@accounts')->name('accounts');
    Route::post('/admin/accounts', 'AdminController@addAccount')->name('addAccount');
    Route::delete('/admin/accounts/{accountId}', 'AdminController@destroyAccount')->name('deleteAccount');
    Route::patch('/admin/accounts/{accountId}', 'AdminController@updateAccount')->name('updateAccount');
    Route::post('/admin/samples', 'AdminController@addSample')->name('addSample');
    //Inventory routes
    Route::get('/admin/inventory/chemicals', 'AdminController@chemicals')->name('inventory-chemicals');
    Route::get('/admin/inventory/glassware', 'AdminController@glassware')->name('inventory-glassware');
});
