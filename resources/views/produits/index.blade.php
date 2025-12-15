@extends('layouts.app')

@section('title', 'Produits')

@section('content')
    <div class="container">
        <h1>Produits</h1>
        <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Quantité</th>
                    <th>Prix de vente</th>
                    <th>Seuil d'alerte</th>
                    <th>Prix de revient moyen</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                    <tr @if($produit->quantite < $produit->seuil_alerte) class="table-danger" @endif>
                        <td>{{ $produit->nom }}</td>

                        <td>
                            {{ $produit->quantite }}
                            @if($produit->quantite < $produit->seuil_alerte)
                                <span class="badge bg-danger">Stock faible</span>
                            @endif
                        </td>

                        <td>{{ number_format($produit->prix_vente, 0, ',', ' ') }} FCFA</td>
                        <td>{{ $produit->seuil_alerte }}</td>

                        <td>
                            @php
                                $totalRevient = $produit->achats->sum(function($achat) {
                                    return $achat->prix_revient * $achat->quantite;
                                });
                                $totalQuantite = $produit->achats->sum('quantite');
                            @endphp

                            @if($totalQuantite > 0)
                                {{ number_format($totalRevient / $totalQuantite, 2, ',', ' ') }} FCFA
                            @else
                                N/A
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('produits.edit', $produit) }}" class="btn btn-sm btn-warning">Modifier</a>

                  <form action="{{ route('produits.destroy', $produit) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="btn btn-sm btn-danger"
                        
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.')"
                    >
                        Supprimer
                    </button>
                </form>
                            <a href="{{ route('produits.achats', $produit->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-history"></i> Historique
                            </a>

                            @if($produit->achats && $produit->achats->count() > 0)
                                <small class="d-block text-muted mt-1">
                                    Dernier achat : {{ \Carbon\Carbon::parse($produit->achats->last()->date_achat)->format('d/m/Y') }}
                                </small>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
