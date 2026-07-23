<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
        'inscription_id',
        'montant',
        'statut',
        'date_paiement'
    ];

    public function inscription()
    {
        return $this->belongsTo(Inscription::class);
    }
}