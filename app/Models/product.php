<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'quantite',
        'prix_achat',
        'base_unit',
        'sales_unit',
        'conversion_factor',
        'seuil_alerte',
        'prix_vente', 
    ];

    /**
     * Accesseur pour afficher la quantité en stock de manière conviviale.
     */
    public function getQuantiteDisplayAttribute()
    {
        if ($this->sales_unit === 'bidon' && $this->conversion_factor > 0) {
            $bidons = floor($this->quantite / $this->conversion_factor);
            $litresRestants = $this->quantite - ($bidons * $this->conversion_factor);

            $display = '';
            if ($bidons > 0) {
                $display .= $bidons . ' bidon(s)';
            }
            if ($litresRestants > 0) {
                if ($display !== '') {
                    $display .= ' et ';
                }
                $display .= number_format($litresRestants, 2, ',', ' ') . ' litre(s)';
            }
            if ($display === '') {
                return '0 ' . $this->base_unit . '(s)';
            }
            return $display;
        }
        return number_format($this->quantite, 2, ',', ' ') . ' ' . $this->base_unit . '(s)';
    }

}
