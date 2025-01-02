<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_id'];

    /**
     * Relacja z użytkownikiem (Gość, który zapisał się na listę oczekujących)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacja z wydarzeniem (wydarzenie, na które zapisał się gość)
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
