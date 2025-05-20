<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Galerie extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\GaleriesFactory> */
    use HasFactory;
    use InteractsWithMedia;

     protected $fillable = [
        'nom_event',
        'description_event',
        'photo_couv',
        'photos',
        'user_id',
    ];


 public function user()
{
    return $this->belongsTo(User::class);
}
}
