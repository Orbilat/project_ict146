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
use App\Stations;

Route::get('/', function () {
    return view('auth.login');

	//Add to login controller
	$stations = Stations::all();

	session(['stations' => $stations]);
    return view('home');
});
//Auth routes
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

Route::get('/client-home', 'EventController@index')->name('events.index');
Route::post('/client-home', 'EventController@addEvent')->name('events.add');

Route::get('/analyst/notification', 'AnalystController@notification')->name('notification');

Route::get('/analyst/inventory', 'AnalystController@inventory')->name('inventory');
Route::post('/analyst/inventory/update', 'AnalystController@inventoryupdate')->name('inventoryupdate');
Route::get('/analyst/inventory/history', 'AnalystController@history')->name('inventoryhistory');

Route::get('/analyst/sample/station/{id}', 'AnalystController@samplePerStation')->name('samplestation');
Route::get('/analyst/{stationid}/sample/{id}', 'AnalystController@sampleDetails')->name('sampledetails');

Route::post('/analyst/receive/sample/{id}', 'AnalystController@receiveSample')->name('receivesample');
Route::post('/analyst/complete/sample/{id}', 'AnalystController@completeSample')->name('completesample');
