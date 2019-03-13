<?php

namespace App\Http\Controllers;

use DateTime;
use Redirect;
use Validator;
use Session;
use App\Employee;
use App\Client;
use App\Parameter;
use App\Supplier;
use App\Payment;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Home Page (/)
    public function admin()
    {
        return view('admin.home');
    }

    // Admin Samples Page (/samples)
    public function samples()
    {
        $accounts = DB::table('employees')->orderBy('employeeName')->paginate(6);
        return view('admin.samples', ['accounts' => $accounts]);
    }

    // Admin Clients Page (/clients)
    public function clients()
    {
        $clients = DB::table('clients')->orderBy('clientId')->paginate(6);
        return view('admin.clients', ['clients' => $clients]);
    }

    // Admin Accounts Page (/accounts)
    public function accounts()
    {
        $accounts = DB::table('employees')->orderBy('employeeName')->paginate(6);
        return view('admin.accounts', ['accounts' => $accounts]);
    }

    // Admin Inventory-Chemicals Page (/inventory/chemicals)
    public function chemicals()
    {
        return view('admin.inventory-chemicals');
    }

    // Admin Inventory-Glassware Page (/inventory/glassware)
    public function glassware()
    {
        return view('admin.inventory-glassware');
    }

    // Admin Parameters Page (/parameters)
    public function stations()
    {
        $stations = DB::table('stations')->paginate(6);
        return view('admin.stations', ['stations' => $stations]);
    }

    // Admin Parameters Page (/parameters)
    public function parameters()
    {
        $parameters = DB::table('parameters')->orderBy('typeOfAnalysis')->paginate(6);
        return view('admin.parameters', ['parameters' => $parameters]);
    }

     // Admin Suppliers Page (/suppliers)
     public function suppliers()
     {
         $suppliers = DB::table('suppliers')->orderBy('companyName')->paginate(6);
         return view('admin.suppliers', ['suppliers' => $suppliers]);
     }

    // ACCOUNT INSERT
    protected function addAccount(Request $request)
    {
        // VALIDATION
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|min:4|unique:employees',
            'password' => 'required|string|min:6|confirmed',
            'employeeName' => 'required|string|max:50|unique:employees',
            'position' => 'required|string|max:30',
            'idNumber' => 'required|string|numeric|unique:employees',
            'licenseNumber' => 'required|string|max:50|unique:employees',
            'userType' => 'required|string|max:20',
        ]);
        //VALIDATION CHECKS
        if ($validator->fails()) {
            return redirect('admin/accounts')
                        ->withErrors($validator)
                        ->withInput();
        }

        //ELOQUENT INSERT
        $account = new Employee;
        $account->username = trim($request->username);
        $account->password = Hash::make($request->password);
        $account->employeeName =  trim($request->employeeName);
        $account->position = trim($request->position);
        $account->idNumber = trim($request->idNumber);
        $account->licenseNumber = trim($request->licenseNumber);
        $account->userType = $request->userType;
        $account->managedBy = Auth::user()->employeeName;
        $account->managedDate = new DateTime();
        //SAVE TO DB
        $account->save();
        //CHECK SAVE
        if($account->save()){
            Session::flash('flash_account_added', 'Account added successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // ACCOUNT DELETE
    protected function destroyAccount($accountId)
    {
        $account = Employee::findOrFail($accountId);
        if($account->delete()){
            Session::flash('flash_account_deleted', 'Account deleted successfully!');
            return Redirect::back();
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // ACCOUNT UPDATE
    protected function updateAccount(Request $request, $accountId)
    {
        // VALIDATION
        $validatorUpdate = Validator::make($request->all(), [
            'username' => 'required|string|max:255|min:4',
            'employeeName' => 'required|string|max:50',
            'position' => 'required|string|max:30',
            'idNumber' => 'required|string|numeric',
            'licenseNumber' => 'required|string|max:50',
            'userType' => 'required|string|max:20',
        ]);
        // VALIDATION CHECKS
        if ($validatorUpdate->fails()) {
            return redirect('admin/accounts')
                        ->withErrors($validatorUpdate)
                        ->withInput();
        }
        // FIND ACCOUNT AND UPDATE
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
            App::abort(500, 'Error!');
        }

    }
    // CLIENT INSERT
    protected function addClient(Request $request)
    {
        // VALIDATION
        $validator = Validator::make($request->all(), [
            'nameOfPerson' => 'required|string|max:255|min:4',
            'nameOfEntity' => 'nullable|string|max:255',
            'address' => 'required|string|max:50',
            'contactNumber' => 'string|numeric',
            'faxNumber' => 'nullable|string|numeric',
            'emailAddress' => 'nullable|string|max:50|email',
            'discount' => 'nullable|numeric|between:0,100',
            'addedCharges' => 'nullable|numeric|between:0,100000',
            'depositedAmount' => 'nullable|numeric|between:0,100000',
            'dateOfSubmission' => 'required|string|max:20',
        ]);
        // VALIDATION CHECKS
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
        $client->contactNumber = trim($request->contactNumber);
        $client->faxNumber = trim($request->faxNumber);
        $client->emailAddress = trim($request->emailAddress);
        $client->dateOfSubmission = $request->dateOfSubmission;
        $client->managedBy = Auth::user()->employeeName;
        $client->managedDate = new DateTime();
        $client->save();
        $client->risNumber = (int)date("Y", strtotime($client->created_at)) . $client->clientId;
        $client->save();
        // INSERT PAYMENT
        $payment = new Payment;
        $payment->testingCost = NULL;
        $payment->discount = (float)$request->discount;
        $payment->addedCharges = (float)$request->addedCharges;
        $payment->depositedAmount = (float)$request->depositedAmount;
        $payment->managedBy = Auth::user()->employeeName;
        $payment->managedDate = new DateTime();
        $payment->save();
        // INSERT TRANSACTION
        $transaction = new Transaction;
        $transaction->client = $client->clientId;
        $transaction->payment = $payment->paymentId;
        $transaction->approvedBy = Auth::user()->employeeId;
        $transaction->transactionDate = $client->dateOfSubmission;
        $transaction->managedBy = Auth::user()->employeeName;
        $transaction->managedDate = new DateTime();
        //SAVE TO DB && CHECK
        if($transaction->save()){
            Session::flash('flash_client_added', 'Client added successfully! Please add the samples of the new client.');
            return view('admin.add_sample');
        }
        else {
            App::abort(500, 'Error!');
        }
    }
    // CLIENT DELETE
    protected function destroyClient($clientId)
    {
        $account = Client::findOrFail($clientId);
        if($account->delete()){
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
            'dateOfSubmission' => 'required|string|max:20',
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
        $client->dateOfSubmission = $request->dateOfSubmission;
        $client->managedBy = Auth::user()->employeeName;
        $client->managedDate = new DateTime();
    
        if($client->save()){
            Session::flash('flash_client_updated', 'Client information updated successfully!');
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
            'typeOfAnalysis' => 'required|string|max:50',
            'chargePerSample' => 'required|string|numeric|max:100000',
            'samplePrepCharge' => 'nullable|string|numeric|max:100000',
            'stationId' => 'required|numeric|max:3',
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
        $parameter->typeOfAnalysis =  trim($request->typeOfAnalysis);
        $parameter->chargePerSample = $request->chargePerSample;
        $parameter->samplePrepCharge = $request->samplePrepCharge;
        $parameter->stationId = $request->stationId;
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
        $account = Parameter::findOrFail($parameterId);
        if($account->delete()){
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
            'typeOfAnalysis' => 'required|string|max:50',
            'chargePerSample' => 'required|string|numeric|max:100000',
            'samplePrepCharge' => 'nullable|string|numeric|max:100000',
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
        $parameter->typeOfAnalysis =  trim($request->typeOfAnalysis);
        $parameter->chargePerSample = $request->chargePerSample;
        $parameter->samplePrepCharge = $request->samplePrepCharge;
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
}
