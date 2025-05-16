<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    /** @use HasFactory<\Database\Factories\PartenairesFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'user_id',
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}
}
