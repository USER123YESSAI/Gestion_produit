<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function create()
    {
        // Affiche le formulaire de creation

        return view('produits.create');
    }
    public function store(Request $request)
    {
        //Enregistre un nouveau produit

        $request->validate([
            'nom'=> 'required|string|max:255',
             'quantite' => 'required|integer|min:0',
             'prix_vente' => 'required|numeric|min:0',
             'seuil_alerte' => 'nullable|integer|min:0',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit ajoute avec succes.');
    } 
}