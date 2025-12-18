@extends('layouts.app')

@section('title', 'Liste des produits')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des produits</h3>
        <div class="card-tools">
            <a href="{{ route('produits.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajouter un produit
            </a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($produits->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Quantité</th>
                            <th>Prix de vente</th>
                            <th>Seuil d'alerte</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->id }}</td>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ $produit->quantite }}</td>
                                <td>{{ number_format($produit->prix_vente, 2, ',', ' ') }} FCFA</td>
                                <td>{{ $produit->seuil_alerte }}</td>
                                <td>
                                    @if ($produit->quantite <= $produit->seuil_alerte)
                                        <span class="badge badge-danger">Stock faible</span>
                                    @else
                                        <span class="badge badge-success">En stock</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                <p>Aucun produit enregistré. <a href="{{ route('produits.create') }}">Créer le premier produit</a></p>
            </div>
        @endif
    </div>
</div>
@endsection

