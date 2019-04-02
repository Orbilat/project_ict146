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
    }

    public function parameters()
    {
        $parameters = DB::table('parameters')->orderBy('analysis')->paginate(6);
        return view('clients.client_S&R', ['parameters' => $parameters]);
    }
}