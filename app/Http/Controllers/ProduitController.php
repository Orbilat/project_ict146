<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    public function index($clientId)
    {
        
        // $produits = Client::all();

        // $produits = DB::table('clients')->where('clientId', $clientId)->get();
        // $samples  = DB::table('samples')->where('risNumber', $clientId)->get();
        $samples = DB::table('samples')
            ->join('clients', 'samples.risNumber', '=', 'clients.clientId')
            ->select('samples.*', 'clients.risNumber as ris','clients.nameOfPerson as nameOfPerson','clients.nameOfEntity as nameOfEntity','clients.managedBy as managedBy','clients.remarks as remarks')
            ->where('samples.risNumber',$clientId)
            ->get();
        $dueDate = DB::table('samples')
            ->join('clients', 'samples.risNumber', '=', 'clients.clientId')
            ->max('dueDate');
            
        return view('produit',['samples'=>$samples, 'dueDate'=>$dueDate]);
    }

    public function search(Request $request){

        $produits = DB::table('clients')->where('clientId', $request->search)->get();

        return view('secretary-file.secretary-search',['clients'=>$produits]);

    }
}
