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
use Carbon\Carbon;

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
        $clients = Client::orderBy('risNumber')->get();

        return view('admin.samples', ['samples' => $samples, 'parameters' => $parameters, 'clients' => $clients]);
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
        $items = Item::with('suppliers')->orderBy('itemName')->paginate(10);
        $suppliers = Supplier::all();

        return view('admin.inventory-glassware', ['items' => $items, 'suppliers' => $suppliers]);
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
        $parameters = Parameter::with('stations')->orderBy('analysis')->paginate(10);

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
        $events = Event::paginate(10);

        return view('admin.create_event', ['events' => $events]);
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
        // Add a client
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
        // Add ris number
        $client->risNumber = date("Y", strtotime($client->created_at)) . '-' . $client->clientId;

        if($client->save()) {
            // Insert transaction
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
                abort(500, 'Error! Transaction was unsuccessful.');
            }
        }
        else {
            abort(500, 'Error! Client was not added successfully.');
        }
    }
    // Delete a client
    protected function destroyClient($clientId)
    {
        $client = Client::findOrFail($clientId);
        if($client->delete()){
            Session::flash('flash_client_deleted', 'Client has been deleted successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Deletion was unsuccessful.');
        }
    }
    // Update client
    protected function updateClient(Request $request, $clientId)
    {
        // Validation
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
            'followUp' => 'required|date',
            'testResult' => 'nullable|string|max:5|min:1',
            'remarks' => 'required|string|max:20',
        ]);
        // Validation fails...
        if ($validatorUpdate->fails()) {
            return redirect('admin/clients')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        // Find client
        $client = Client::findOrFail($clientId);
        // Update values
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
    
        if($client->save()){
            Session::flash('flash_client_updated', 'Client information updated successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error!');
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
        // Add lab code
        $sample->laboratoryCode = date("Y", strtotime($sample->created_at)) . '-' . date("m", strtotime($sample->created_at)) . '-' . $sample->sampleId;
        // Insert sample tests
        foreach ($request->parameter as $parameter => $analysis) {
            $sampletests = new Sample_Tests;
            $sampletests->sampleCode = $sample->sampleId;
            $sampletests->parameters = Parameter::where('analysis', $analysis)->value('parameterId');
            $sampletests->managedBy = Auth::user()->employeeName;
            $sampletests->managedDate = new DateTime();
            $sampletests->save();
        }
        // Return to add sample page
        if($sample->save()){

            $users = Employee::all();
            $when = now()->addMinutes(5);

            foreach ($users as $user) {
                if ($user['username'] == 'tester' || $user['username'] == 'secretary') {

                    $user->notify((new SampleDueDate($sample))->delay($when));
                    // ProcessNotification::dispatch($user, $sample);
                }
            }

            $params = Parameter::all();
            Session::flash('flash_sample_added', 'Sample added successfully! You can add another sample.');

            return view('admin.add_sample', ['clientRis' => $request->clientId, 'parameters' => $params]);
        }
        else {
            abort(500, 'Error! Sample not added.');
        }
        
    }
    // Add samples manually to client
    protected function insertSample(Request $request)
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
        // Check validation
        if ($validator->fails()) {
            return redirect('admin/clients')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Find client
        $client = Client::where('risNumber', $request->clientId)->value('clientId');

        // Insert new sample
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
        // Add lab code
        $sample->laboratoryCode = date("Y", strtotime($sample->created_at)) . '-' . date("m", strtotime($sample->created_at)) . '-' . $sample->sampleId;
        // Insert sample tests
        foreach ($request->parameter as $parameter => $analysis) {
            $sampletests = new Sample_Tests;
            $sampletests->sampleCode = $sample->sampleId;
            $sampletests->parameters = Parameter::where('analysis', $analysis)->value('parameterId');
            $sampletests->status = "Not Started";
            $sampletests->managedBy = Auth::user()->employeeName;
            $sampletests->managedDate = new DateTime();
            $sampletests->save();
        }
        // Return to samples page
        if($sample->save()){

            $sample = (new SampleDueDate($sample))->delay(Carbon::now()->addSeconds(15));
            
            // $emailJob = (new SendAnnouncementEmail($user->email))->delay(Carbon::now()->addSeconds(3));

            Session::flash('flash_sample_added', 'Sample inserted successfully!');
            return redirect()->action('AdminController@samples');
        }
        else {
            abort(500, 'Error! Sample not added.');
        }
        
    }
    // Delete a sample
    protected function destroySample($sampleId)
    {
        $sample = Sample::findOrFail($sampleId);
        if($sample->delete()){
            Session::flash('flash_sample_deleted', 'Sample deleted successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Sample not deleted.');
        }
    }
    // Update sample
    protected function updateSample(Request $request, $sampleId)
    {
        // Validation
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
        // Validation fails
        if ($validatorUpdate->fails()) {
            return redirect('admin/clients')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        // Get id of client
        $client = Client::where('risNumber', $request->clientId)->value('clientId');

        // Find sample
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
        // Add lab code
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
        // Add sample tests
        foreach ($request->parameter as $parameter => $analysis) {
            $sampletests = new Sample_Tests;
            $sampletests->sampleCode = $sample->sampleId;
            $sampletests->parameters = Parameter::where('analysis', $analysis)->value('parameterId');
            $sampletests->status = "Not Started";
            $sampletests->managedBy = Auth::user()->employeeName;
            $sampletests->managedDate = new DateTime();
            $sampletests->save();
        }
        
        if($sample->save()){
            Session::flash('flash_sample_updated', 'Sample updated successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Sample not updated.');
        }
    }
    // Add parameter
    protected function addParameter(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'analysis' => 'required|string|max:255|unique:parameters',
            'method' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'station' => 'required|string|max:10',
        ]);
        // Validation fails
        if ($validator->fails()) {
            return redirect('admin/parameters')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Insert parameter
        $parameter = new Parameter;
        $parameter->analysis = trim($request->analysis);
        $parameter->method = trim($request->method);
        $parameter->price = $request->price;
        $parameter->station = Station::where('stationName', $request->station)->value('stationId');
        $parameter->managedBy = Auth::user()->employeeName;
        $parameter->managedDate = new DateTime();
        // Save
        if($parameter->save()){
            Session::flash('flash_parameter_added', 'Analysis added successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Parameter not added.');
        }
    }
    // Delete parameter
    protected function destroyParameter($parameterId)
    {
        $parameter = Parameter::findOrFail($parameterId);
        if($parameter->delete()){
            Session::flash('flash_parameter_deleted', 'Analysis has been deleted successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Parameter not deleted.');
        }
    }
    // Update parameter
    protected function updateParameter(Request $request, $parameterId)
    {
        // Validation
        $validatorUpdate = Validator::make($request->all(), [
            'analysis' => 'required|string|max:255',
            'method' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'station' => 'required|string|max:10',
        ]);
        // Validation fails
        if ($validatorUpdate->fails()) {
            return redirect('admin/parameters')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        // Find parameter
        $parameter = Parameter::findOrFail($parameterId);
        $parameter->analysis = trim($request->analysis);
        $parameter->method = trim($request->method);
        $parameter->price = $request->price;
        $parameter->station = Station::where('stationName', $request->station)->value('stationId');
        $parameter->managedBy = Auth::user()->employeeName;
        $parameter->managedDate = new DateTime();
        // Save
        if($parameter->save()){
            Session::flash('flash_parameter_updated', 'Analysis information updated successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Parameter not updated.');
        }
    }
    // Add supplier
    protected function addSupplier(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255|unique:suppliers',
            'emailAddress' => 'nullable|string|min:6',
            'contactNumber' => 'required|string|max:50|unique:suppliers',
        ]);
        // Validation fails
        if ($validator->fails()) {
            return redirect('admin/suppliers')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Insert supplier
        $supplier = new Supplier;
        $supplier->companyName = trim($request->companyName);
        $supplier->emailAddress = trim($request->emailAddress);
        $supplier->contactNumber =  trim($request->contactNumber);
        $supplier->managedBy = Auth::user()->employeeName;
        $supplier->managedDate = new DateTime();
        // Save
        if($supplier->save()){
            Session::flash('flash_supplier_added', 'Supplier added successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Supplier not added.');
        }
    }
    // Delete supplier
    protected function destroySupplier($supplierId)
    {
        $supplier = Supplier::findOrFail($supplierId);
        if($supplier->delete()){
            Session::flash('flash_supplier_deleted', 'Supplier deleted successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Supplier not deleted.');
        }
    }
    // Update supplier
    protected function updateSupplier(Request $request, $supplierId)
    {
        // Validation
        $validatorUpdate = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'emailAddress' => 'nullable|string|min:6',
            'contactNumber' => 'required|string|max:50',
        ]);
        // Validation fails
        if ($validatorUpdate->fails()) {
            return redirect('admin/suppliers')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        // Find supplier
        $supplier = Supplier::findOrFail($supplierId);
        $supplier->companyName = trim($request->companyName);
        $supplier->emailAddress = trim($request->emailAddress);
        $supplier->contactNumber =  trim($request->contactNumber);
        $supplier->managedBy = Auth::user()->employeeName;
        $supplier->managedDate = new DateTime();
        // Save
        if($supplier->save()){
            Session::flash('flash_supplier_updated', 'Supplier updated successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Supplier not updated.');
        }
    }
    // Add station
    protected function addStation(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'stationName' => 'required|string|max:255|unique:stations'
        ]);
        // Validation fails
        if ($validator->fails()) {
            return redirect('admin/stations')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Insert station
        $station = new Station;
        $station->stationName = trim($request->stationName);
        $station->managedBy = Auth::user()->employeeName;
        $station->managedDate = new DateTime();
        // Save
        if($station->save()){
            Session::flash('flash_station_added', 'Station added successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Station not added.');
        }
    }
    // Delete Station
    protected function destroyStation($stationId)
    {
        $station = Station::findOrFail($stationId);
        if($station->delete()){
            Session::flash('flash_station_deleted', 'Station deleted successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Station not deleted.');
        }
    }
    // Add event
    protected function addEvent(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'eventName' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date'
        ]);
        // Validation fails
        if ($validator->fails()) {
            return redirect('admin/events')
                        ->withErrors($validator)
                        ->withInput();
        }
        // Insert event
        $event = new Event;
        // $event->event_name = trim($request->eventName);
        $event->event_name = $request->eventName;
        $event->start_date = $request->startDate;
        $event->end_date = $request->endDate;

        // dd($event);
        //CHECK SAVE
        if($event->save()){
            Session::flash('flash_event_added', 'Event added successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error!');
        }
    }
    // Add glassware
    protected function addItem(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'itemName' => 'required|string|min:3|max:255',
            'containerType' => 'required|string|min:6|max:255',
            'volumeCapacity' => 'required|numeric',
            'quantity' => 'required|numeric',
            'supplier' => 'required|string',
        ]);
        // Validation fails
        if ($validator->fails()) {
            return redirect('admin/inventory/glassware')
                        ->withErrors($validator)
                        ->withInput();
        }
        // Add item
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
            abort(500, 'Error! Item not added.');
        }
    }
    // DESTROY ITEM
    protected function destroyItem($itemId)
    {
        $item = Item::findOrFail($itemId);
        if($item->delete()){
            Session::flash('flash_item_deleted', 'Item deleted successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Item not deleted.');
        }
    }
    // UPDATE ITEM
    protected function updateItem(Request $request, $itemId)
    {
        // Validation
        $validatorUpdate = Validator::make($request->all(), [
            'itemName' => 'required|string|min:3|max:255',
            'containerType' => 'required|string|min:6|max:255',
            'volumeCapacity' => 'required|numeric',
            'quantity' => 'required|numeric',
            'supplier' => 'required|string',
        ]);
        // Validation fails
        if ($validatorUpdate->fails()) {
            return redirect('admin/inventory/glassware')
                        ->withErrors($validator)
                        ->withInput();
        }
        // Find item
        $item = Item::findOrFail($itemId);
        $item->itemName = trim($request->itemName);
        $item->containerType = trim($request->containerType);
        $item->volumeCapacity = $request->volumeCapacity;
        $item->quantity = $request->quantity;
        $item->supplier = Supplier::where('companyName', $request->supplier)->value('supplierId');
        $item->managedBy = Auth::user()->employeeName;
        $item->managedDate = new DateTime;
        if($item->save()) {
            Session::flash('flash_item_updated', 'Item updated successfully!');
            return Redirect::back();
        }
        else {
            abort(500, 'Error! Item was not updated.');
        }
    }
}
