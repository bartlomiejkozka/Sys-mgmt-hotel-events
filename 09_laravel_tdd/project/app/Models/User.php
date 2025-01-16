<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Dziedziczymy z odpowiedniej klasy
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
    const ROLE_ADMIN = 'admin';
    const ROLE_GUEST = 'guest';

    /**
     * Relacja z rezerwacjami
     */
    public function reservations()
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
