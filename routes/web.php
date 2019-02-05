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
Route::get('/client-home', function () {
    return view('clients.client_home');
});
Route::get('/S&R', function () {
    return view('clients.client_S&R');
});
Route::get('/contact', function () {
    return view('clients.client_contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
