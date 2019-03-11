<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Clients::all();
        return view('produit',['produits'=>$produits]);
    }
}
