<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Session;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    public function index($clientId)
    {
        
        // $produits = Client::all();

        // $produits = DB::table('clients')->where('clientId', $clientId)->get();
        // $samples  = DB::table('samples')->where('risNumber', $clientId)->get();
        // $samples = DB::table('samples')
        //     ->join('clients', 'samples.risNumber', '=', 'clients.clientId')
        //     ->select('samples.*', 'clients.risNumber as ris','clients.nameOfPerson as nameOfPerson','clients.nameOfEntity as nameOfEntity','clients.managedBy as managedBy','clients.remarks as remarks')
        //     ->where('samples.risNumber', $clientId)
        //     ->get();
        // $idOfSample = DB::table('samples')->where('samples.risNumber', $clientId)->value('sampleId');
        // $parameters = DB::table('sample__tests')
        //     ->join('samples', 'sample__tests.sampleCode', '=', 'samples.sampleId')
        //     ->join('parameters', 'sample__tests.parameters', '=', 'parameters.parameterId')
        //     ->select('parameters.analysis as analysis')
        //     ->where('samples.sampleId', $idOfSample)
        //     ->where('samples.sampleId', 'sample__tests.sampleCode')
        //     ->where('parameters.parameterId', 'sample__tests.parameters')
        //     ->get();
            
        $client=Client::where('clientId', $clientId)->with('samples.parameters')->get();
        // $slip = DB::table('clients')->where('clientId', $clientId)->get();


        return view('produit',['client'=>$client]);
    }


    public function search(Request $request){

        $produits = DB::table('clients')->where('clientId', $request->search)->get();

        if(count($produits)<1){
            Session::flash('flash_not_found', 'No Client ID exists.');
            return view('secretary-file.search-fail');
          }

        else{
            
            return view('secretary-file.secretary-search',['clients'=>$produits]);
            
        }
    }
}
