<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palmares extends Model
{
    use HasFactory;

    protected $fillable = [
        'valeur',
        'titre',
        'sous_titre',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
