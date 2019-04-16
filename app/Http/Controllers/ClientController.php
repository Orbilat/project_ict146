<?php

namespace App\Http\Controllers;

use App\Client;
use App\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parameter;

class ClientController extends Controller
{
    public function RIS(Request $request)
    {
        
        $risNumber = Client::where('risNumber', '=', $request->search)->first();
        
        if($risNumber != NULL) {
            $clients = Client::where('risNumber', $request->search)->with('samples.parameters')->get();
            
            return view('clients.client_RIS', ['clients' => $clients]);
        }
        else {
            return view('clients.risError');
        }
    }

    public function parameters()
    {
        $parameters = DB::table('parameters')->orderBy('analysis')->paginate(6);
        return view('clients.client_S&R', ['parameters' => $parameters]);
    }
}