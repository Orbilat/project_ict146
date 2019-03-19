<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Client::all();
        return view('produit',['produits'=>$produits]);
    }
}
