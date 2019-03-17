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

        $produits = DB::table('clients')->where('clientId', $clientId)->get();

        return view('produit',['produits'=>$produits]);
    }

    public function search(Request $request){

        $produits = DB::table('clients')->where('clientId', $request->search)->get();

        return view('secretary-file.secretary-search',['clients'=>$produits]);

    }
}
