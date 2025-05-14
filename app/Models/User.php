<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

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
