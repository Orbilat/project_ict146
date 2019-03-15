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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');

	//Add to login controller
	$stations = Stations::all();

	session(['stations' => $stations]);
    return view('home');
});

Route::get('barcode','ProduitController@index');


//Auth routes
// Route::get('/client-home', function () {
//     return view('clients.client_home');


//CLIENT ROUTES
Route::get('/RIS', function () {
    return view('clients.client_RIS');
})->name('RIS');
Route::get('/client-home', 'EventsController@index')->name('events.index');
Route::post('/client-home', 'EventsController@addEvent')->name('events.add');
Route::get('/S&R', function () {
    return view('clients.client_S&R');
});
Route::get('/contact', [
    'uses' => 'ContactMessageController@create'
]);
Route::post('/contact', [
    'uses' => 'ContactMessageController@store',
    'as' => 'contact.store'
]);
// END CLIENT ROUTES


//SECRETARY ROUTES
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/secretary', 'SecretaryController@index')->name('notification-secretary');
Route::get('/secretary/notification', 'SecretaryController@index')->name('notification-secretary');
Route::get('/secretary/inventory', 'SecretaryController@inve')->name('inventory');
Route::get('/secretary/view', 'SecretaryController@stat')->name('view');
Route::get('/secretary/add', 'SecretaryController@add')->name('addSecretary');

// Route::get('/secretary/form',function() {
//     return view('secretary-file.ris');
//  });
Route::get('/secretary/ris', 'SecretaryController@ris')->name('ris');
// Route::get('/dynamic_pdf', 'DynamicPDFController@index');
Route::get('/dynamic_pdf', 'SecretaryController@samples');
Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');
Route::get('/secretary/create','SecretaryController@create')->name('createReport');
Route::post('/secretary/create', 'SecretaryController@addClient')->name('addClient-secretary');

//END SECRETARY ROUTES

//ADMIN ROUTES
//Redirect route
Route::redirect('/admin', '/admin/home');
//Middleware for User Content Control
Route::middleware(['admin','auth'])->group(function (){
    //Admin routes
    //testroute
    Route::get('/admin/add_sample', function () {
        return view('admin.add_sample');
    });
    //endtestroute
    Route::get('/admin/home', 'AdminController@admin')->name('admin');
    Route::get('/admin/samples', 'AdminController@samples')->name('samples');
    Route::get('/admin/clients', 'AdminController@clients')->name('clients');
    Route::get('/admin/accounts', 'AdminController@accounts')->name('accounts');
    Route::get('/admin/parameters', 'AdminController@parameters')->name('parameters');
    Route::post('/admin/accounts', 'AdminController@addAccount')->name('addAccount');
    Route::delete('/admin/accounts/{accountId}', 'AdminController@destroyAccount')->name('deleteAccount');
    Route::patch('/admin/accounts/{accountId}', 'AdminController@updateAccount')->name('updateAccount');
    Route::post('/admin/clients', 'AdminController@addClient')->name('addClient');
    Route::delete('/admin/clients/{clientId}', 'AdminController@destroyClient')->name('deleteClient');
    Route::patch('/admin/clients/{clientId}', 'AdminController@updateClient')->name('updateClient');
    Route::post('/admin/samples', 'AdminController@addSample')->name('addSample');
    Route::post('/admin/parameters', 'AdminController@addParameter')->name('addParameter');
    Route::delete('/admin/clients/{parameterId}', 'AdminController@destroyParameter')->name('deleteParameter');
    Route::patch('/admin/clients/{parameterId}', 'AdminController@updateParameter')->name('updateParameter');
    //Inventory routes
    Route::get('/admin/inventory/chemicals', 'AdminController@chemicals')->name('inventory-chemicals');
    Route::get('/admin/inventory/glassware', 'AdminController@glassware')->name('inventory-glassware');
});
// END ADMIN ROUTES


// ANALYST ROUTES
Route::redirect('/analyst', '/analyst/notification');
Route::get('/analyst/notification', 'AnalystController@notification')->name('notification');

Route::get('/analyst/inventory', 'AnalystController@inventory')->name('inventory');
Route::post('/analyst/inventory/update', 'AnalystController@inventoryupdate')->name('inventoryupdate');
Route::get('/analyst/inventory/history', 'AnalystController@history')->name('inventoryhistory');

Route::get('/analyst/sample/station/{id}', 'AnalystController@samplePerStation')->name('samplestation');
Route::get('/analyst/{stationid}/sample/{id}', 'AnalystController@sampleDetails')->name('sampledetails');

Route::post('/analyst/receive/sample/{id}', 'AnalystController@receiveSample')->name('receivesample');
Route::post('/analyst/complete/sample/{id}', 'AnalystController@completeSample')->name('completesample');
// END ANALYST ROUTES

