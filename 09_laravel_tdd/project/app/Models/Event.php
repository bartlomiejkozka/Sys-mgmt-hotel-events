<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'location', 'event_date', 'max_guests'];

    /**
     * Relacja z rezerwacjami (wydarzenie może mieć wiele rezerwacji)
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
     * czy wydarzenie jest pełne
     */
    public function isFull()
    {
        return $this->reservations()->count() >= $this->max_guests;
    }
}
