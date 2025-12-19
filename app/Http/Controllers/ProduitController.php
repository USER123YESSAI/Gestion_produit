<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Liste des produits
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    // Formulaire de création
    public function create()
    {
        return view('produits.create');
    }

    // Enregistre un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer|min:0',
            'prix_vente' => 'required|numeric|min:0',
            'seuil_alerte' => 'nullable|integer|min:0',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    // Formulaire d'édition
    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    // Mise à jour en base
    public function update(Request $request, Produit $produit)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer|min:0',
            'prix_vente' => 'required|numeric|min:0',
            'seuil_alerte' => 'required|integer|min:0',
        ]);

        $produit->update($validated);

        return redirect()->route('produits.index')
                         ->with('success', 'Produit mis à jour avec succès.');
    }

    // AJOUTEZ CETTE MÉTHODE POUR LA SUPPRESSION (de delete-product)
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')
                         ->with('success', 'Produit supprimé avec succès.');
    }
}