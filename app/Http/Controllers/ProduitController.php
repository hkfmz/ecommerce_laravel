<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;

class ProduitController extends Controller
{
    public function index()
    { 
        $produits = Produit::inRandomOrder()->take(6)->get();
        return view('produits.index')->with('produits', $produits);
    }

    public function show($slug)
    {
        $produit = Produit::where('slug', $slug)->firstOrFail();

        return view('produits.show')->with('produit', $produit);
    }
}
 