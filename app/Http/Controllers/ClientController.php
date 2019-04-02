<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parameter;

class ClientController extends Controller
{
    public function RIS(Request $request)
    {
<<<<<<< HEAD
        $RisNumber = DB::table('clients')
        ->join('samples', 'clients.clientId', '=', 'samples.risNumber')
        ->join('sample__tests', 'samples.sampleId', '=', 'sample__tests.sampleCode')
        ->join('parameters', 'sample__tests.parameters', '=', 'parameters.parameterId')
        ->select('samples.laboratoryCode as laboratoryCode', 'sample__tests.status  as status', 'parameters.analysis  as analysis', 'clients.managedDate as managedDate')
        ->where('clients.risNumber', $request->search)
        ->get();
        return view('clients.client_RIS')->with('ris', $RisNumber);
=======
        $risExplode = explode("-", $request->search);
        if(count($risExplode) > 1){
            $risNoDash = $risExplode[0].$risExplode[1];
            $RisNumber = Client::with('samples')->where('risNumber', '=', $risNoDash)->first();
            if(isset($RisNumber)){
            return view('clients.client_RIS')->with('ris', $RisNumber);
            }
        }
        else{
            return view('clients.risError');
        }
        
>>>>>>> 93c8009382dd7aff74466657f358791dfc6ef3ac
    }

    public function parameters()
    {
        $parameters = DB::table('parameters')->orderBy('analysis')->paginate(6);
        return view('clients.client_S&R', ['parameters' => $parameters]);
    }
}