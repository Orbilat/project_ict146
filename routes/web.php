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
<<<<<<< HEAD
//Auth routes
=======
Route::get('/client-home', function () {
    return view('clients.client_home');
});Route::get('/S&R', function () {
    return view('clients.client_S&R');
});
Route::get('/contact', [
    'uses' => 'ContactMessageController@create'
]);
Route::post('/contact', [
    'uses' => 'ContactMessageController@store',
    'as' => 'contact.store'
]);
Route::get('/RIS', function () {
    return view('clients.client_RIS');
})->name('RIS');
>>>>>>> b2b9750c82d3c1729e80c94d483fa2036209f237
Auth::routes();
//Home route
Route::get('/home', 'HomeController@index')->name('home');
<<<<<<< HEAD
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
=======

Route::get('/client-home', 'EventController@index')->name('events.index');
Route::post('/client-home', 'EventController@addEvent')->name('events.add');
>>>>>>> b2b9750c82d3c1729e80c94d483fa2036209f237
