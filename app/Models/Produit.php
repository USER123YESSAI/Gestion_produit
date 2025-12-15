<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom',
        'quantite',
        'prix_vente',
        'seuil_alerte',
    ];
}
