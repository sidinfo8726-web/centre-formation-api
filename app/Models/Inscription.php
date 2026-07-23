<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paiement;

class Inscription extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'formation_id',
        'date_inscription'
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}