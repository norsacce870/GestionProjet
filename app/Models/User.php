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
        'name',
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
        return $this->hasMany(Players::class, 'id');
    }
     public function galeries()
    {
        return $this->hasMany(Galeries::class, 'id');
    }

    public function coordonnees()
    {
        return $this->hasMany(Cordonnees::class, 'id');
    }

    public function videos()
    {
        return $this->hasMany(Videos::class, 'id');
    }

    public function actualites()
    {
        return $this->hasMany(Actualites::class, 'id');
    }

    public function partenaires()
    {
        return $this->hasMany(Partenaires::class, 'id');
    }

    public function publicites()
    {
        return $this->hasMany(Publicites::class, 'id');
    }

}
