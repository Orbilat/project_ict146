<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function RIS(Request $request)
    {
        $RisNumber = DB::table('clients')->where('risNumber',$request->search)->first();
        return view('clients.client_RIS')->with('ris', $RisNumber);
    }
}
