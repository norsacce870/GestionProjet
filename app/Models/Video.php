<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideosFactory> */
    use HasFactory;

     protected $fillable = [
        'titre',
        'lien',
        'user_id',
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}
}
