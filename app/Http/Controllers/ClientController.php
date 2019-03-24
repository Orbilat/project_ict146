<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parameter;

class ClientController extends Controller
{
    public function RIS(Request $request)
    {
        $RisNumber = DB::table('clients')
        ->join('samples', 'clients.clientId', '=', 'samples.risNumber')
        ->join('sample__tests', 'samples.sampleId', '=', 'sample__tests.sampleCode')
        ->select('clients.risNumber as risNumber', 'samples.laboratoryCode as laboratoryCode', 'sample__tests.status as status', 'clients.managedDate as managedDate')
        ->where('clients.risNumber', $request->search)
        ->get();
        return view('clients.client_RIS')->with('ris', $RisNumber);
    }

    public function parameters()
    {
    $parameters = DB::table('parameters')->orderBy('analysis')->paginate(6);
    return view('clients.client_S&R', ['parameters' => $parameters]);
    }
}