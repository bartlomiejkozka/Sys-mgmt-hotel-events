<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_id', 'status'];

    // Statusy rezerwacji
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_PENDING = 'pending';

    /**
     * Relacja z użytkownikiem (Gość, który zarezerwował miejsce)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacja z wydarzeniem (wydarzenie, na które zarezerwowano miejsce)
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * czy rezerwacja jest aktywna
     */
    public function isActive()
    {
        return $this->status === self::STATUS_CONFIRMED;
    }
}
