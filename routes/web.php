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

	//Add to login controller
	$stations = Stations::all();

	session(['stations' => $stations]);
    return view('home');
});

Auth::routes();

Route::get('/analyst/notification', 'AnalystController@notification')->name('notification');

Route::get('/analyst/inventory', 'AnalystController@inventory')->name('inventory');
Route::post('/analyst/inventory/update', 'AnalystController@inventoryupdate')->name('inventoryupdate');
Route::get('/analyst/inventory/history', 'AnalystController@history')->name('inventoryhistory');

Route::get('/analyst/sample/station/{id}', 'AnalystController@samplePerStation')->name('samplestation');
Route::get('/analyst/{stationid}/sample/{id}', 'AnalystController@sampleDetails')->name('sampledetails');

Route::post('/analyst/receive/sample/{id}', 'AnalystController@receiveSample')->name('receivesample');
Route::post('/analyst/complete/sample/{id}', 'AnalystController@completeSample')->name('completesample');
