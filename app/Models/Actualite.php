<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    /** @use HasFactory<\Database\Factories\ActualitesFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'auteur',
        'contenu',
        'user_id',
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}
}
