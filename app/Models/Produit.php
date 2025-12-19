<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'quantite',
        'prix_vente',
        'seuil_alerte',
        
    ];

    // Optionnel : Définir les valeurs par défaut
    protected $attributes = [
        'statut' => 'actif'
    ];
}