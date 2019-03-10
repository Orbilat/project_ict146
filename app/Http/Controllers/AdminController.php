<?php

namespace App\Http\Controllers;

use DateTime;
use Redirect;
use Validator;
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
        return view('admin.samples');
    }

    // Admin Clients Page (/clients)
    public function clients()
    {
        return view('admin.clients');
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
        $employee = new Employee;
        $employee->username = trim($request->username);
        $employee->password = Hash::make($request->password);
        $employee->employeeName =  trim($request->employeeName);
        $employee->position = trim($request->position);
        $employee->idNumber = trim($request->idNumber);
        $employee->licenseNumber = trim($request->licenseNumber);
        $employee->userType = $request->userType;
        $employee->managedBy = Auth::user()->employeeName;
        $employee->managedDate = new DateTime();
        //SAVE TO DB
        $employee->save();
        //CHECK SAVE
        if($employee->save()){
            return Redirect::back()->with('alert','Account added successfully!');
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
