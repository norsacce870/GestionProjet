<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Contact extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'message',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        // Aucun champ masqué pour le moment
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Ajouter des casts ici si besoin
        ];
    }

    /**
     * Register media conversions for Contact model.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();

        $this->addMediaConversion('small')
            ->width(400)
            ->nonQueued();

        $this->addMediaConversion('normal')
            ->width(800)
            ->nonQueued();

        $this->addMediaConversion('large')
            ->width(1200)
            ->nonQueued();
    }

    // Exemple de relation : si un contact est lié à un utilisateur
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
