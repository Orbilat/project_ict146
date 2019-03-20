<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parameter;

class ClientController extends Controller
{
    public function RIS(Request $request)
    {
        $RisNumber = DB::table('samples')->where('risNumber',$request->search)->first();
        return view('clients.client_RIS')->with('ris', $RisNumber);
    }

    public function parameters()
    {
    $parameters = DB::table('parameters')->orderBy('analysis')->paginate(6);
    return view('clients.client_S&R', ['parameters' => $parameters]);
    }
}