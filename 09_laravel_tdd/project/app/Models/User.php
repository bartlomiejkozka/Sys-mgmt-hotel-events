<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Database\Factories\UserFactory;

/**
 * @template TFactory of \Database\Factories\UserFactory
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
     *
     * @return HasMany<WaitingList, User>
     */
    public function waitingList(): HasMany
    {
        return $this->hasMany(WaitingList::class);
    }

    /**
     * Sprawdzenie, czy użytkownik to admin
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * Sprawdzenie, czy użytkownik to gość
     *
     * @return bool
     */
    public function isGuest(): bool
    {
        return $this->role === self::ROLE_GUEST;
    }
}
