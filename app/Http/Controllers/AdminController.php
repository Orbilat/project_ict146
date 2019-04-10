<?php

namespace App\Http\Controllers;

use Exception;
use DateTime;
use DateInterval;
use Redirect;
use Validator;
use Session;
use App\Event;
use App\Employee;
use App\Client;
use App\Sample;
use App\Sample_Tests;
use App\Parameter;
use App\Station;
use App\Supplier;
use App\Item;
use App\Transaction;
use App\Notifications\ReadyForPickUp;
use App\Notifications\SampleDueDate;
use App\Jobs\ProcessNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin home page
    public function admin()
    {
        return view('admin.home');
    }

    // Summary of clients with samples
    public function transactions()
    {
        $transactions = Client::with('samples.parameters')
                        ->paginate(10);

        return view('admin.transactions', ['transactions' => $transactions]);
    }

    // Samples page
    public function samples()
    {
        $samples = Sample::with('client')->paginate(10);
        $parameters = Parameter::all();

        return view('admin.samples', ['samples' => $samples, 'parameters' => $parameters]);
    }

    // Clients page
    public function clients()
    {
        $clients = Client::orderBy('clientId')->paginate(10);

        return view('admin.clients', ['clients' => $clients]);
    }

    // Employee accounts page
    public function accounts()
    {
        $accounts = Employee::orderBy('employeeName')->paginate(10);

        return view('admin.accounts', ['accounts' => $accounts]);
    }

    // Item use history page
    public function history()
    {
        return view('admin.inventory-history');
    }

    // Glassware page
    public function glassware()
    {
        $items = Item::with('suppliers')->paginate(10);

        return view('admin.inventory-glassware', ['items' => $items]);
    }

    // Stations page
    public function stations()
    {
        $stations = Station::paginate(5);

        return view('admin.stations', ['stations' => $stations]);
    }

    // Parameters page
    public function parameters()
    {
        $parameters = Parameter::with('station')->orderBy('analysis')->paginate(10);

        return view('admin.parameters', ['parameters' => $parameters]);
    }

     // Suppliers page
    public function suppliers()
    {
        $suppliers = Supplier::orderBy('companyName')->paginate(10);

        return view('admin.suppliers', ['suppliers' => $suppliers]);
    }

    // Create event page
    public function events()
    {
        return view('admin.create_event');
    }

    // Add employee account
    protected function addAccount(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:30|min:4|unique:employees',
            'password' => 'required|string|min:6|confirmed',
            'employeeName' => 'required|string|max:50|unique:employees',
            'position' => 'required|string|max:30',
            'idNumber' => 'required|string|numeric|unique:employees',
            'licenseNumber' => 'required|string|max:50|unique:employees',
            'userType' => 'required|string|max:20',
        ]);
        // Validation checks
        if ($validator->fails()) {
            return redirect('admin/accounts')
                        ->withErrors($validator)
                        ->withInput();
        }

        $account = new Employee;
        $account->username = trim($request->username);
        $account->password = Hash::make($request->password);
        $account->employeeName =  trim($request->employeeName);
        $account->position = trim($request->position);
        $account->idNumber = trim($request->idNumber);
        $account->licenseNumber = trim($request->licenseNumber);
        $account->userType = $request->userType;
        $account->managedBy = Auth::user()->employeeName;
        $account->managedDate = new DateTime;

        if($account->save()){
            Session::flash('flash_account_added', 'Employee account added successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Employee was not added successfully.');
        }
    }
    // Delete employee account
    protected function destroyAccount($accountId)
    {
        $account = Employee::findOrFail($accountId);

        if($account->delete()){
            Session::flash('flash_account_deleted', 'Account deleted successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Account was not removed successfully.');
        }
    }
    // Update employee account
    protected function updateAccount(Request $request, $accountId)
    {
        // Validation
        $validatorUpdate = Validator::make($request->all(), [
            'username' => 'required|string|max:255|min:4',
            'employeeName' => 'required|string|max:50',
            'position' => 'required|string|max:30',
            'idNumber' => 'required|string|numeric',
            'licenseNumber' => 'required|string|max:50',
            'userType' => 'required|string|max:20',
        ]);
        // Validation check
        if ($validatorUpdate->fails()) {
            return redirect('admin/accounts')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }

        $account = Employee::findOrFail($accountId);
        $account->username = trim($request->username);
        $account->employeeName =  trim($request->employeeName);
        $account->position = trim($request->position);
        $account->idNumber = trim($request->idNumber);
        $account->licenseNumber = trim($request->licenseNumber);
        $account->userType = $request->userType;
        $account->managedBy = Auth::user()->employeeName;
        $account->managedDate = new DateTime();

        if($account->save()){
            Session::flash('flash_account_updated', 'Account updated successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Account was not updated successfully.');
        }
    }

    // Add client
    protected function addClient(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'nameOfPerson' => 'required|string|max:255|min:4',
            'nameOfEntity' => 'nullable|string|max:255',
            'address' => 'required|string|max:50',
            'contactNumber' => 'string|numeric',
            'faxNumber' => 'nullable|string|numeric',
            'emailAddress' => 'nullable|string|max:50|email',
            'discount' => 'nullable|numeric|between:0,100',
            'deposit' => 'nullable|numeric|between:0,100000',
            'reclaimSample' => 'required|numeric',
            'followUp' => 'required|date',
            'testResult' => 'nullable|string|max:5|min:1',
            'remarks' => 'required|string|max:20',
        ]);
        // Validation fails
        if ($validator->fails()) {
            return redirect('admin/clients')
                        ->withErrors($validator)
                        ->withInput();
        }
        // INSERT CLIENT
        $client = new Client;
        $client->nameOfPerson = trim($request->nameOfPerson);
        $client->nameOfEntity = trim($request->nameOfEntity);
        $client->address =  trim($request->address);
        $client->contactNumber = ("63" . trim($request->contactNumber));
        $client->faxNumber = trim($request->faxNumber);
        $client->emailAddress = trim($request->emailAddress);
        $client->discount = $request->discount;
        $client->deposit = $request->deposit;
        $client->testResult = $request->testResult;
        $client->reclaimSample = $request->reclaimSample;
        $client->remarks = trim($request->remarks);
        $client->followUp = $request->followUp;
        $client->managedBy = Auth::user()->employeeName;
        $client->managedDate = new DateTime();
        $client->save();

        if (strlen((string)($client->clientId)) == 1) {
            $idOfClient = (string)("000".$client->clientId);
        } elseif (strlen((string)($client->clientId)) == 2) {
            $idOfClient = (string)("00".$client->clientId);
        } elseif (strlen((string)($client->clientId)) == 3) {
            $idOfClient = (string)("0".$client->clientId);
        } else {
            $idOfClient = (string)$client->clientId;
        }

        $client->risNumber = date("Y", strtotime($client->created_at)) . '-' . $idOfClient;

        if($client->save()) {

            $transaction = new Transaction;
            $transaction->client = $client->clientId;
            $transaction->approvedBy = Auth::user()->employeeId;
            $transaction->managedBy = Auth::user()->employeeName;
            $transaction->managedDate = new DateTime();

            if($transaction->save()){
                $parameter = Parameter::all();
                $clientRis = $client->risNumber;
    
                Session::flash('flash_client_added', 'Client added successfully! Please add the samples of the new client.');
                return view('admin.add_sample', ['clientRis' => $clientRis, 'parameters' => $parameter]);
            }
            else {
                App::abort(500, 'Error!');
            }
        }
        else {



        }
    }
    // CLIENT DELETE
    protected function destroyClient($clientId)
    {
        $client = Client::findOrFail($clientId);
        if($client->delete()){
            Session::flash('flash_client_deleted', 'Client has been deleted successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // CLIENT UPDATE
    protected function updateClient(Request $request, $clientId)
    {
        // VALIDATION
        $validatorUpdate = Validator::make($request->all(), [
            'nameOfPerson' => 'required|string|max:255|min:4',
            'nameOfEntity' => 'nullable|string|max:255',
            'address' => 'required|string|max:50',
            'contactNumber' => 'string|numeric',
            'faxNumber' => 'nullable|string|numeric',
            'emailAddress' => 'nullable|string|max:50|email',
            'discount' => 'nullable|numeric|between:0,100',
            'deposit' => 'nullable|numeric|between:0,100000',
            'reclaimSample' => 'required|numeric',
            'testResult' => 'nullable|string|max:5|min:1',
            'remarks' => 'required|string|max:20',
            'newDateSubmit' => 'nullable|max:50'
        ]);
        // VALIDATION CHECKS
        if ($validatorUpdate->fails()) {
            return redirect('admin/clients')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        // FIND CLIENT AND UPDATE
        $client = Client::findOrFail($clientId);
        $client->nameOfPerson = trim($request->nameOfPerson);
        $client->nameOfEntity = trim($request->nameOfEntity);
        $client->address =  trim($request->address);
        $client->contactNumber = trim($request->contactNumber);
        $client->faxNumber = trim($request->faxNumber);
        $client->emailAddress = trim($request->emailAddress);
        $client->discount = $request->discount;
        $client->deposit = $request->deposit;
        $client->testResult = $request->testResult;
        $client->reclaimSample = $request->reclaimSample;
        $client->remarks = trim($request->remarks);
        $client->followUp = $request->followUp;
        $client->managedBy = Auth::user()->employeeName;
        if ($request->newDateSubmit == NULL) {
            $client->managedDate = Client::where('clientId', $clientId)->value('managedDate');
        } else {
            $client->managedDate = $request->newDateSubmit;
        }
    
        if($client->save()){
            Session::flash('flash_client_updated', 'Client information updated successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }

    }
    // Adding of sample
    protected function addSample(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'clientId' => 'required',
            'clientsCode' => 'nullable|string|max:255',
            'sampleType' => 'required|string|max:255',
            'sampleCollection' => 'required|string|max:50',
            'samplePreservation' => 'nullable|string|max:50',
            'parameter' => 'required',
            'purposeOfAnalysis' => 'nullable|string|max:50',
            'sampleSource' => 'required|string|max:20',
            'dueDate' => 'required|string|max:50',
        ]);
        // Validation fails
        if ($validator->fails()) {
            return redirect('admin/clients')
                        ->withErrors($validator)
                        ->withInput();
        }
        // Find id of client
        $client = Client::where('risNumber', $request->clientId)->value('clientId');
        // Insert sample
        $sample = new Sample;
        $sample->risNumber = $client;
        $sample->clientsCode = trim($request->clientsCode);
        $sample->sampleType =  trim($request->sampleType);
        $sample->sampleCollection = $request->sampleCollection;
        $sample->samplePreservation = trim($request->samplePreservation);
        $sample->purposeOfAnalysis = trim($request->purposeOfAnalysis);
        $sample->sampleSource = $request->sampleSource;
        $sample->dueDate = $request->dueDate;
        $sample->managedBy = Auth::user()->employeeName;
        $sample->managedDate = new DateTime();
        $sample->save();
        //INSERT LAB CODE TO SAMPLES
        if (strlen((string)($sample->sampleId)) == 1) {
            $idOfSample = (string)("000".$sample->sampleId);
        } elseif (strlen((string)($sample->sampleId)) == 2) {
            $idOfSample = (string)("00".$sample->sampleId);
        } elseif (strlen((string)($sample->sampleId)) == 3) {
            $idOfSample = (string)("0".$sample->sampleId);
        } else {
            $idOfSample = (string)$sample->sampleId;
        }
        $sample->laboratoryCode = $request->clientId . '-' . $idOfSample;
        //INSERT SAMPLE TESTS IN LOOP
        foreach ($request->parameter as $parameter => $analysis) {
            $sampletests = new Sample_Tests;
            $sampletests->sampleCode = $sample->sampleId;
            $sampletests->parameters = Parameter::where('analysis', $analysis)->value('parameterId');
            $sampletests->managedBy = Auth::user()->employeeName;
            $sampletests->managedDate = new DateTime();
            $sampletests->save();
        }
        //RETURN TO ADD SAMPLE PAGE TO ADD MORE SAMPLES
        if($sample->save()){

            $sample->notify(new SampleDueDate($sample));

            $params = Parameter::all();
            Session::flash('flash_sample_added', 'Sample added successfully! You can add another sample.');
            return view('admin.add_sample', ['clientRis' => $request->clientId, 'parameters' => $params]);
        }
        else {
            abort(500, 'Error!');
        }
        
    }
    // SAMPLE INSERT
    protected function insertSample(Request $request)
    {
        // VALIDATION
        $validator = Validator::make($request->all(), [
            'clientId' => 'required',
            'clientsCode' => 'nullable|string|max:255',
            'sampleType' => 'required|string|max:255',
            'sampleCollection' => 'required|string|max:50',
            'samplePreservation' => 'nullable|string|max:50',
            'parameter' => 'required',
            'purposeOfAnalysis' => 'nullable|string|max:50',
            'sampleSource' => 'required|string|max:20',
            'dueDate' => 'required|string|max:50',
        ]);
        //VALIDATION CHECKS
        if ($validator->fails()) {
            return redirect('admin/clients')
                        ->withErrors($validator)
                        ->withInput();
        }
        $client = Client::where('risNumber', $request->clientId)->value('clientId');

        //ELOQUENT INSERT
        $sample = new Sample;
        $sample->risNumber = $client;
        $sample->clientsCode = trim($request->clientsCode);
        $sample->sampleType =  trim($request->sampleType);
        $sample->sampleCollection = $request->sampleCollection;
        $sample->samplePreservation = trim($request->samplePreservation);
        $sample->purposeOfAnalysis = trim($request->purposeOfAnalysis);
        $sample->sampleSource = $request->sampleSource;
        $sample->dueDate = $request->dueDate;
        $sample->managedBy = Auth::user()->employeeName;
        $sample->managedDate = new DateTime();
        $sample->save();
        //INSERT LAB CODE TO SAMPLES
        if (strlen((string)($sample->sampleId)) == 1) {
            $idOfSample = (string)("000".$sample->sampleId);
        } elseif (strlen((string)($sample->sampleId)) == 2) {
            $idOfSample = (string)("00".$sample->sampleId);
        } elseif (strlen((string)($sample->sampleId)) == 3) {
            $idOfSample = (string)("0".$sample->sampleId);
        } else {
            $idOfSample = (string)$sample->sampleId;
        }
        $sample->laboratoryCode = $request->clientId . '-' . $idOfSample;
        //INSERT SAMPLE TESTS IN LOOP
        foreach ($request->parameter as $parameter => $analysis) {
            $sampletests = new Sample_Tests;
            $sampletests->sampleCode = $sample->sampleId;
            $sampletests->parameters = Parameter::where('analysis', $analysis)->value('parameterId');
            $sampletests->status = "In Progress";
            $sampletests->managedBy = Auth::user()->employeeName;
            $sampletests->managedDate = new DateTime();
            $sampletests->save();
        }
        //RETURN TO ADD SAMPLE PAGE TO ADD MORE SAMPLES
        if($sample->save()){

            $sample->notify(new SampleDueDate($sample));

            Session::flash('flash_sample_added', 'Sample inserted successfully!');
            return redirect()->action('AdminController@samples');;
        }
        else {
            App::abort(500, 'Error!');
        }
        
    }
    // SAMPLE DELETE
    protected function destroySample($sampleId)
    {
        $sample = Sample::findOrFail($sampleId);
        if($sample->delete()){
            Session::flash('flash_sample_deleted', 'Sample deleted successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // ACCOUNT UPDATE
    protected function updateSample(Request $request, $sampleId)
    {
        // VALIDATION
        $validatorUpdate = Validator::make($request->all(), [
            'clientId' => 'required',
            'clientsCode' => 'nullable|string|max:255',
            'sampleType' => 'required|string|max:255',
            'sampleCollection' => 'required|string|max:50',
            'samplePreservation' => 'nullable|string|max:50',
            'parameter' => 'required',
            'purposeOfAnalysis' => 'nullable|string|max:50',
            'sampleSource' => 'required|string|max:20',
            'dueDate' => 'required|string|max:50',
        ]);
        //VALIDATION CHECKS
        if ($validatorUpdate->fails()) {
            return redirect('admin/clients')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        if(strlen($request->clientId) == 9){
            $removeDash = explode('-', $request->clientId);
            $finalId = $removeDash[0].$removeDash[1];
        }
        $client = Client::where('risNumber', $finalId)->value('clientId');

        //ELOQUENT INSERT
        $sample = Sample::findOrFail($sampleId);
        $sample->risNumber = $client;
        $sample->clientsCode = trim($request->clientsCode);
        $sample->sampleType =  trim($request->sampleType);
        $sample->sampleCollection = $request->sampleCollection;
        $sample->samplePreservation = trim($request->samplePreservation);
        $sample->purposeOfAnalysis = trim($request->purposeOfAnalysis);
        $sample->sampleSource = $request->sampleSource;
        $sample->dueDate = $request->dueDate;
        $sample->managedBy = Auth::user()->employeeName;
        $sample->managedDate = new DateTime();
        $sample->save();
        //INSERT LAB CODE TO SAMPLES
        if (strlen((string)($sample->sampleId)) == 1) {
            $idOfSample = (string)("000".$sample->sampleId);
        } elseif (strlen((string)($sample->sampleId)) == 2) {
            $idOfSample = (string)("00".$sample->sampleId);
        } elseif (strlen((string)($sample->sampleId)) == 3) {
            $idOfSample = (string)("0".$sample->sampleId);
        } else {
            $idOfSample = (string)$sample->sampleId;
        }
        $sample->laboratoryCode = $finalId . '-' . $idOfSample;
        //INSERT SAMPLE TESTS IN LOOP
        foreach ($request->parameter as $parameter => $analysis) {
            $sampletests = new Sample_Tests;
            $sampletests->sampleCode = $sample->sampleId;
            $sampletests->parameters = Parameter::where('analysis', $analysis)->value('parameterId');
            $sampletests->status = "In Progress";
            $sampletests->managedBy = Auth::user()->employeeName;
            $sampletests->managedDate = new DateTime();
            $sampletests->save();
        }
        if($account->save()){
            Session::flash('flash_account_updated', 'Account updated successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }

    }
    // PARAMETER INSERT
    protected function addParameter(Request $request)
    {
        // VALIDATION
        $validator = Validator::make($request->all(), [
            'analysis' => 'required|string|max:255|unique:parameters',
            'method' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'station' => 'required|string|max:10',
        ]);
        // VALIDATION CHECKS
        if ($validator->fails()) {
            return redirect('admin/parameters')
                        ->withErrors($validator)
                        ->withInput();
        }

        //ELOQUENT INSERT
        $parameter = new Parameter;
        $parameter->analysis = trim($request->analysis);
        $parameter->method = trim($request->method);
        $parameter->price = $request->price;
        $parameter->station = Station::where('stationName', $request->station)->value('stationId');
        $parameter->managedBy = Auth::user()->employeeName;
        $parameter->managedDate = new DateTime();
        //SAVE TO DB && CHECK
        if($parameter->save()){
            Session::flash('flash_parameter_added', 'Analysis added successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // PARAMETER DELETE
    protected function destroyParameter($parameterId)
    {
        $parameter = Parameter::findOrFail($parameterId);
        if($parameter->delete()){
            Session::flash('flash_parameter_deleted', 'Analysis has been deleted successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // PARAMETER UPDATE
    protected function updateParameter(Request $request, $parameterId)
    {
        // VALIDATION
        $validatorUpdate = Validator::make($request->all(), [
            'analysis' => 'required|string|max:255',
            'method' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'station' => 'required|string|max:10',
        ]);
        // VALIDATION CHECKS
        if ($validatorUpdate->fails()) {
            return redirect('admin/parameters')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        // FIND CLIENT AND UPDATE
        $parameter = Parameter::findOrFail($parameterId);
        $parameter->analysis = trim($request->analysis);
        $parameter->method = trim($request->method);
        $parameter->price = $request->price;
        $parameter->station = Station::where('stationName', $request->station)->value('stationId');
        $parameter->managedBy = Auth::user()->employeeName;
        $parameter->managedDate = new DateTime();
    
        if($parameter->save()){
            Session::flash('flash_parameter_updated', 'Analysis information updated successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // SUPPLIER INSERT
    protected function addSupplier(Request $request)
    {
        // VALIDATION
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255|unique:suppliers',
            'emailAddress' => 'nullable|string|min:6',
            'contactNumber' => 'required|string|max:50|unique:suppliers',
        ]);
        //VALIDATION CHECKS
        if ($validator->fails()) {
            return redirect('admin/suppliers')
                        ->withErrors($validator)
                        ->withInput();
        }

        //ELOQUENT INSERT
        $supplier = new Supplier;
        $supplier->companyName = trim($request->companyName);
        $supplier->emailAddress = trim($request->emailAddress);
        $supplier->contactNumber =  trim($request->contactNumber);
        $supplier->managedBy = Auth::user()->employeeName;
        $supplier->managedDate = new DateTime();
        //CHECK SAVE
        if($supplier->save()){
            Session::flash('flash_supplier_added', 'Supplier added successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // SUPPLIER DELETE
    protected function destroySupplier($supplierId)
    {
        $supplier = Supplier::findOrFail($supplierId);
        if($supplier->delete()){
            Session::flash('flash_supplier_deleted', 'Supplier deleted successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // SUPPLIER UPDATE
    protected function updateSupplier(Request $request, $supplierId)
    {
        // VALIDATION
        $validatorUpdate = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'emailAddress' => 'nullable|string|min:6',
            'contactNumber' => 'required|string|max:50',
        ]);
        // VALIDATION CHECKS
        if ($validatorUpdate->fails()) {
            return redirect('admin/suppliers')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        // FIND SUPPLIER AND UPDATE
        $supplier = Supplier::findOrFail($supplierId);
        $supplier->companyName = trim($request->companyName);
        $supplier->emailAddress = trim($request->emailAddress);
        $supplier->contactNumber =  trim($request->contactNumber);
        $supplier->managedBy = Auth::user()->employeeName;
        $supplier->managedDate = new DateTime();
        if($supplier->save()){
            Session::flash('flash_supplier_updated', 'Supplier updated successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // STATION INSERT
    protected function addStation(Request $request)
    {
        // VALIDATION
        $validator = Validator::make($request->all(), [
            'stationName' => 'required|string|max:255|unique:stations'
        ]);
        //VALIDATION CHECKS
        if ($validator->fails()) {
            return redirect('admin/stations')
                        ->withErrors($validator)
                        ->withInput();
        }

        //ELOQUENT INSERT
        $station = new Station;
        $station->stationName = trim($request->stationName);
        $station->managedBy = Auth::user()->employeeName;
        $station->managedDate = new DateTime();
        //CHECK SAVE
        if($station->save()){
            Session::flash('flash_station_added', 'Station added successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // STATION DELETE
    protected function destroyStation($stationId)
    {
        $station = Station::findOrFail($stationId);
        if($station->delete()){
            Session::flash('flash_station_deleted', 'Station deleted successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // EVENT ADD
    protected function addEvent(Request $request)
    {
        // VALIDATION
        $validator = Validator::make($request->all(), [
            'eventName' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date'
        ]);
        //VALIDATION CHECKS
        if ($validator->fails()) {
            return redirect('admin/home')
                        ->withErrors($validator)
                        ->withInput();
        }
        //ELOQUENT INSERT
        $event = new Event;
        $event->event_name = trim($request->eventName);
        $event->start_date = $request->startDate;
        $event->end_date = $request->endDate;
        //CHECK SAVE
        if($event->save()){
            Session::flash('flash_event_added', 'Event added successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // ADD ITEM (GLASSWARE)
    protected function addItem(Request $request)
    {
        // VALIDATION
        $validator = $request->validate([
            'itemName' => 'required|string|min:3|max:255',
            'containerType' => 'required|string|min:6|max:255',
            'volumeCapacity' => 'required|numeric',
            'quantity' => 'required|numeric',
            'supplier' => 'required|string'
        ]);

        $item = new Item;
        $item->itemName = trim($request->itemName);
        $item->containerType = trim($request->containerType);
        $item->volumeCapacity = $request->volumeCapacity;
        $item->quantity = $request->quantity;
        $item->supplier = Supplier::where('companyName', $request->supplier)->value('supplierId');
        $item->managedBy = Auth::user()->employeeName;
        $item->managedDate = new DateTime;
        if($item->save()) {
            Session::flash('flash_event_added', 'Event added successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // DESTROY ITEM
    protected function destroyItem($itemId)
    {

    }
    // UPDATE ITEM
    protected function updateItem(Request $request, $itemId)
    {

    }
}
