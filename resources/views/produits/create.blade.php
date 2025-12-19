@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajouter un produit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('produits.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom du produit') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantite" class="col-md-4 col-form-label text-md-end">{{ __('Quantité') }}</label>

                            <div class="col-md-6">
                                <input id="quantite" type="number" min="0" class="form-control @error('quantite') is-invalid @enderror" name="quantite" value="{{ old('quantite') }}" required>

                                @error('quantite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prix_vente" class="col-md-4 col-form-label text-md-end">{{ __('Prix de vente') }}</label>

                            <div class="col-md-6">
                                <input id="prix_vente" type="number" step="0.01" min="0" class="form-control @error('prix_vente') is-invalid @enderror" name="prix_vente" value="{{ old('prix_vente') }}" required>

                                @error('prix_vente')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="seuil_alerte" class="col-md-4 col-form-label text-md-end">{{ __('Seuil d\'alerte') }}</label>

                            <div class="col-md-6">
                                <input id="seuil_alerte" type="number" min="0" class="form-control @error('seuil_alerte') is-invalid @enderror" name="seuil_alerte" value="{{ old('seuil_alerte', 10) }}">

                                @error('seuil_alerte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter le produit') }}
                                </button>
                                <a href="{{ route('produits.index') }}" class="btn btn-secondary">
                                    {{ __('Annuler') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection