@extends('layouts.app')

@section('title', 'Liste des produits')
@section('page-title', 'Gestion des Produits')

@section('breadcrumb')
    <li class="breadcrumb-item active">Liste des produits</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-boxes mr-1"></i>
            Liste des produits
        </h3>
        <div class="card-tools">
            <a href="{{ route('produits.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Nouveau produit
            </a>
        </div>
    </div>
    <div class="card-body">
        @if ($produits->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th>Nom</th>
                            <th width="10%">Quantité</th>
                            <th width="15%">Prix</th>
                            <th width="10%">Seuil</th>
                            <th width="12%">Statut</th>
                            <th width="20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td><strong>#{{ $produit->id }}</strong></td>
                                <td>{{ $produit->nom }}</td>
                                <td>
                                    <span class="badge badge-{{ $produit->quantite > 0 ? 'info' : 'danger' }}">
                                        {{ $produit->quantite }} unités
                                    </span>
                                </td>
                                <td>{{ number_format($produit->prix_vente, 2, ',', ' ') }} FCFA</td>
                                <td>{{ $produit->seuil_alerte }}</td>
                                <td>
                                    @if ($produit->quantite <= $produit->seuil_alerte && $produit->quantite > 0)
                                        <span class="badge badge-warning">Stock faible</span>
                                    @elseif($produit->quantite == 0)
                                        <span class="badge badge-danger">Rupture</span>
                                    @else
                                        <span class="badge badge-success">En stock</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('produits.edit', $produit->id) }}" 
                                           class="btn btn-warning" 
                                           title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <form action="{{ route('produits.destroy', $produit->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-danger" 
                                                    title="Supprimer"
                                                    onclick="return confirm('Supprimer ce produit ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        
                                        <a href="#" 
                                           class="btn btn-info" 
                                           title="Détails">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Stats -->
            <div class="row mt-3">
                <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-box"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total produits</span>
                            <span class="info-box-number">{{ $produits->count() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">En stock</span>
                            <span class="info-box-number">
                                {{ $produits->where('quantite', '>', 0)->count() }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-exclamation-triangle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Stock faible</span>
                            <span class="info-box-number">
                                {{ $produits->where('quantite', '>', 0)->where('quantite', '<=', \DB::raw('seuil_alerte'))->count() }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-times-circle"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Rupture</span>
                            <span class="info-box-number">
                                {{ $produits->where('quantite', 0)->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">Aucun produit enregistré</h4>
                <p class="text-muted">Commencez par ajouter votre premier produit</p>
                <a href="{{ route('produits.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> Créer le premier produit
                </a>
            </div>
        @endif
    </div>
    @if($produits->count() > 0)
    <div class="card-footer">
        <div class="text-muted">
            <small>
                <i class="fas fa-info-circle"></i>
                Affichage de {{ $produits->count() }} produit(s)
            </small>
        </div>
    </div>
    @endif
</div>
@endsection