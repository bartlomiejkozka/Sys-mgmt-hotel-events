<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TFactory of ReviewFactory
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_id', 'rating', 'comment'];

    /**
     * Relacja z użytkownikiem (Gość, który ocenił wydarzenie)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacja z wydarzeniem (wydarzenie, które zostało ocenione)
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
