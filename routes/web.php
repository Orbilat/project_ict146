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
use App\Station;

Auth::routes();

Route::get('/', function () {
    $stations = Station::all();

    session(['stations' => $stations]);
    return view('auth.login');
});


//Auth routes
// Route::get('/client-home', function () {
//     return view('clients.client_home');


//CLIENT ROUTES
Route::get('/RIS', function () {
    return view('clients.client_RIS');
})->name('RisNumber');
Route::post('/RIS', 'ClientController@RIS')->name('RIS');

Route::get('/client-home', 'EventsController@index')->name('events.index');
Route::post('/client-home', 'EventsController@addEvent')->name('events.add');
Route::get('/S&R', 'ClientController@parameters')->name('parameters-client');
Route::get('/contact', [
    'uses' => 'ContactMessageController@create'
]);
Route::post('/contact', [
    'uses' => 'ContactMessageController@store',
    'as' => 'contact.store'
]);
// END CLIENT ROUTES


//SECRETARY ROUTES
Route::middleware(['secretary','auth'])->group(function (){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/secretary', 'SecretaryController@index')->name('notification-secretary');
Route::get('/secretary/inventory', 'SecretaryController@inve')->name('inventory');
Route::get('/secretary/view', 'SecretaryController@stat')->name('view');
Route::get('/secretary/add', 'SecretaryController@status')->name('addSecretary');
Route::post('/secretary/add/{clientId}', 'SecretaryController@paid')->name('paidSecretary');

Route::get('/dynamic_pdf', 'SecretaryController@samples');
Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');
Route::get('/secretary/create','SecretaryController@create')->name('createClient');
Route::post('/secretary/create', 'SecretaryController@addClient')->name('addClient-secretary');
Route::post('/secretary/create-sample','SecretaryController@addSample')->name('createSample-secretary');
Route::get('/secretary/form','SecretaryController@form')->name('form');
Route::get('/barcode/{clientId}','ProduitController@index')->name('barcode');
Route::post('/secretary/search','ProduitController@search')->name('search-barcode');
// Route::post('/secretary/search/not_found','ProduitController@search')->name('search-fail');
});

//END SECRETARY ROUTES

//ADMIN ROUTES
//Redirect route
Route::redirect('/admin', '/admin/home');
//Middleware for User Content Control
Route::middleware(['admin','auth'])->group(function (){
    //Admin routes
    Route::get('/admin/home', 'AdminController@admin')->name('admin');
    Route::get('/admin/transactions', 'AdminController@transactions')->name('transactions');
    Route::get('/admin/samples', 'AdminController@samples')->name('samples-admin');
    Route::get('/admin/clients', 'AdminController@clients')->name('clients-admin');
    Route::get('/admin/accounts', 'AdminController@accounts')->name('accounts-admin');
    Route::get('/admin/stations', 'AdminController@stations')->name('stations-admin');
    Route::get('/admin/parameters', 'AdminController@parameters')->name('parameters-admin');
    //ADD, DELETE AND UPDATE ROUTES
    Route::post('/admin/accounts', 'AdminController@addAccount')->name('addAccount-admin');
    Route::delete('/admin/accounts/{accountId}', 'AdminController@destroyAccount')->name('deleteAccount-admin');
    Route::patch('/admin/accounts/{accountId}', 'AdminController@updateAccount')->name('updateAccount-admin');
    Route::post('/admin/clients', 'AdminController@addClient')->name('addClient-admin');
    Route::delete('/admin/clients/{clientId}', 'AdminController@destroyClient')->name('deleteClient-admin');
    Route::patch('/admin/clients/{clientId}', 'AdminController@updateClient')->name('updateClient-admin');
    Route::post('/admin/samples-add', 'AdminController@addSample')->name('addSample-admin');
    Route::post('/admin/samples', 'AdminController@insertSample')->name('insertSample-admin');
    Route::delete('/admin/samples/{sampleId}', 'AdminController@destroySample')->name('destroySample-admin');
    Route::patch('/admin/samples/{sampleId}', 'AdminController@updateSample')->name('updateSample-admin');
    Route::post('/admin/stations', 'AdminController@addStation')->name('addStation-admin');
    Route::delete('/admin/stations/{stationId}', 'AdminController@destroyStation')->name('destroyStation-admin');
    Route::patch('/admin/stations/{stationId}', 'AdminController@updateStation')->name('updateStation-admin');
    Route::post('/admin/parameters', 'AdminController@addParameter')->name('addParameter-admin');
    Route::delete('/admin/parameters/{parameterId}', 'AdminController@destroyParameter')->name('deleteParameter-admin');
    Route::patch('/admin/parameters/{parameterId}', 'AdminController@updateParameter')->name('updateParameter-admin');
    Route::post('/admin/home', 'AdminController@addEvent')->name('addEvent-admin');
    //Inventory routes
    Route::get('/admin/suppliers', 'AdminController@suppliers')->name('suppliers-admin');
    Route::post('/admin/suppliers', 'AdminController@addSupplier')->name('addSupplier-admin');
    Route::delete('/admin/suppliers/{supplierId}', 'AdminController@destroySupplier')->name('deleteSupplier-admin');
    Route::patch('/admin/suppliers/{supplierId}', 'AdminController@updateSupplier')->name('updateSupplier-admin');
    Route::post('/admin/inventory/glassware', 'AdminController@addItem')->name('addItem-admin');
    Route::delete('/admin/inventory/glassware/{itemId}', 'AdminController@destroyItem')->name('destroyItem-admin');
    Route::patch('/admin/inventory/glassware/{itemId}', 'AdminController@updateItem')->name('updateItem-admin');
    Route::get('/admin/inventory/history', 'AdminController@history')->name('inventory-history-admin');
    Route::get('/admin/inventory/glassware', 'AdminController@glassware')->name('inventory-glassware-admin');
});
// END ADMIN ROUTES


//Route::middleware(['analyst','auth'])->group(function (){
    // ANALYST ROUTES
    Route::middleware(['auth'])->group(function (){
    Route::redirect('/analyst', '/analyst/notification');
    Route::get('/analyst/notification', 'AnalystController@notification')->name('analystnotification');

    Route::get('/analyst/inventory', 'AnalystController@inventory')->name('analystinventory');
    Route::post('/analyst/inventory/update', 'AnalystController@inventoryupdate')->name('inventoryupdate');
    Route::get('/analyst/inventory/history', 'AnalystController@history')->name('inventoryhistory');

    Route::get('/analyst/sample/station/{id}', 'AnalystController@samplePerStation')->name('samplestation');
    Route::get('/analyst/{stationid}/sample/{id}', 'AnalystController@sampleDetails')->name('sampledetails');

    Route::post('/analyst/receive/sample/{id}', 'AnalystController@receiveSample')->name('receivesample');
    Route::post('/analyst/complete/sample/{id}', 'AnalystController@completeSample')->name('completesample');
    Route::get('/analyst/sendmessage', 'AnalystController@sendMessage');
});
    // END ANALYST ROUTES
//});
