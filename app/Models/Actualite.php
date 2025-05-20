<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Actualite extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ActualiteFactory> */
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'auteur',
        'contenu',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        //
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            //
        ];
    }

    /**
     * Register media conversions.
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

    /**
     * Relation avec l'utilisateur auteur de l'actualité.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

