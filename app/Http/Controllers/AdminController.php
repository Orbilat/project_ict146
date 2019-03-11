<?php

namespace App\Http\Controllers;

use DateTime;
use Redirect;
use Validator;
use Session;
use App\Employee;
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
        $accounts = DB::table('employees')->orderBy('employeeName')->paginate(10);
        return view('admin.samples', ['accounts' => $accounts]);
    }

    // Admin Clients Page (/clients)
    public function clients()
    {
        $accounts = DB::table('employees')->orderBy('employeeName')->paginate(10);
        return view('admin.clients', ['accounts' => $accounts]);
    }

    // Admin Accounts Page (/accounts)
    public function accounts()
    {
        $accounts = DB::table('employees')->orderBy('employeeName')->paginate(10);
        return view('admin.accounts', ['accounts' => $accounts]);
    }

    // Admin Inventory-Chemicals Page (/inventory)
    public function chemicals()
    {
        return view('admin.inventory-chemicals');
    }

    // Admin Inventory-Chemicals Page (/inventory)
    public function glassware()
    {
        return view('admin.inventory-glassware');
    }

    // Adding New Account (/admin/accounts)
    // FROM routes/web.php -> Route::post
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
    // Deleting an account
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
    // Updating an account
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
            App::abort(500, 'Error!');
        }

    }
    // Adding Client (/)
    // FROM routes/web.php -> Route::post
    protected function addClient(Request $request)
    {
        
    }
}
