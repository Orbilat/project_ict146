<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $accounts = DB::table('employees')
                    
                    ->get();
        return view('admin.accounts', ['accounts' => $accounts]);
    }

    // Admin Inventory Page (/inventory)
    public function inventory()
    {
        return view('admin.inventory');
    }

    // Adding Client (/)
    // FROM routes/web.php -> Route::post
    protected function addClient(Request $request)
    {
        
    }
}
