@extends('layouts.app')

@section('title', 'Modifier un produit')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier le produit</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produits.update', $produit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom du produit</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $produit->nom) }}" required>
            </div>

            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" name="quantite" class="form-control" value="{{ old('quantite', $produit->quantite) }}" required>
            </div>

            <div class="form-group">
                <label for="prix_vente">Prix de vente</label>
                <input type="number" step="0.01" name="prix_vente" class="form-control" value="{{ old('prix_vente', $produit->prix_vente) }}" required>
            </div>

            <div class="form-group">
                <label for="seuil_alerte">Seuil d'alerte</label>
                <input type="number" name="seuil_alerte" class="form-control" value="{{ old('seuil_alerte', $produit->seuil_alerte) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection