<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cordonnees extends Model
{
    /** @use HasFactory<\Database\Factories\CordonneesFactory> */
    use HasFactory;

     protected $fillable = [
        'nom',
        'icone',
    ];


     public function user()
{
    return $this->belongsTo(User::class,'user_id');
}
}
