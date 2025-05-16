<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /** @use HasFactory<\Database\Factories\PlayersFactory> */
    use HasFactory;

     protected $fillable = [
        'nom',
        'prenom',
        'poste',
        'numero',
        'naissance_at',
        'poids',
        'taille',
        'club',
        'valeur',
        'fin_contrat_at',
        'user_id',
    ];


     public function user()
{
    return $this->belongsTo(User::class);
}
}
