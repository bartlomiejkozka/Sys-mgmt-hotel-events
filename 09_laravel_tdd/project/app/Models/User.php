<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
 */

/**
 * @property int $id
 * @property string $role
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * Wypełnialne atrybuty
     */
    protected $fillable = ['name', 'email', 'password', 'role'];

    /**
     * Ukryte atrybuty w serializacji
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atrybuty rzutowane na inne typy
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Hasło jest hashowane automatycznie
    ];

    // Role użytkowników
    public const ROLE_ADMIN = 'admin';
    public const ROLE_GUEST = 'guest';

    /**
     * @return HasMany<Reservation, User>
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Relacja z listą oczekujących
     */
    public function waitingList()
    {
        return $this->hasMany(WaitingList::class);
    }

    /**
     * Sprawdzenie, czy użytkownik to admin
     */
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * Sprawdzenie, czy użytkownik to gość
     */
    public function isGuest()
    {
        return $this->role === self::ROLE_GUEST;
    }
}
