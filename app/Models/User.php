<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */ 
    use HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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

    public function players()
    {
        return $this->hasMany(Player::class);
    }
     public function galeries()
    {
        return $this->hasMany(Galerie::class);
    }

    public function coordonnees()
    {
        return $this->hasMany(Coordonnee::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function actualites()
    {
        return $this->hasMany(Actualite::class);
    }

    public function partenaires()
    {
        return $this->hasMany(Partenaire::class);
    }

    public function publicites()
    {
        return $this->hasMany(Publicite::class);
    }

}
