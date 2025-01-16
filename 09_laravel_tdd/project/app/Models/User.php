<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role'];
    // Role użytkowników (można dodać enumerację lub stałe)
    const ROLE_ADMIN = 'admin';
    const ROLE_GUEST = 'guest';
    /**
     * Relacja z rezerwacjami (Gość może mieć wiele rezerwacji)
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    /**
     * Relacja z listą oczekujących
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function waitingList()
    {
        return $this->hasMany(WaitingList::class);
    }
    /**
     * sprawdzić czy użytkownik to admin
     */
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
    /**
     * sprawdzić czy użytkownik to gość
     */
    public function isGuest()
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
        return $this->role === self::ROLE_GUEST;
    }

    /**
     * @return HasMany<Reservation, $this>
     */

}
