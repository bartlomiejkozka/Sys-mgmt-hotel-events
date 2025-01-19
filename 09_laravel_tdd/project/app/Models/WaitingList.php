<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TFactory of \Database\Factories\WaitingListFactory
 */
class WaitingList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_id'];

    /**
     * Relacja z użytkownikiem (Gość, który zapisał się na listę oczekujących)
     *
     * @return BelongsTo<User, WaitingList>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacja z wydarzeniem (wydarzenie, na które zapisał się gość)
     *
     * @return BelongsTo<Event, WaitingList>
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
