<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Inscription;

class Formation extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'prix'
    ];

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}