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
<<<<<<< HEAD
=======
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
>>>>>>> 95bd6a1366ebd82c7973c98431686b893a7aba51
=======
>>>>>>> 050ba6030c7f5df4aa5d680deab169bdc7c99f82
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
        
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 93c8009382dd7aff74466657f358791dfc6ef3ac
>>>>>>> 95bd6a1366ebd82c7973c98431686b893a7aba51
=======
>>>>>>> 050ba6030c7f5df4aa5d680deab169bdc7c99f82
    }

    public function parameters()
    {
        $parameters = DB::table('parameters')->orderBy('analysis')->paginate(6);
        return view('clients.client_S&R', ['parameters' => $parameters]);
    }
}