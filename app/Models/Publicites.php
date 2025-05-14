<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicites extends Model
{
    /** @use HasFactory<\Database\Factories\PublicitesFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];


    public function user()
{
    return $this->belongsTo(User::class,'user_id');
}
}
