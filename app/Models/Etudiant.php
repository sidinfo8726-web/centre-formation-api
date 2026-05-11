<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inscription;
class Etudiant extends Model
{protected $fillable = [
    'nom',
    'prenom',
    'email',
    'telephone'
];
    //
}
public function inscriptions()
{
    return $this->hasMany(Inscription::class);
}