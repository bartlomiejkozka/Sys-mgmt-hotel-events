<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Event;

/**
 * @template TFactory of \Database\Factories\ReviewFactory
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_id', 'rating', 'comment'];

    /**
     * Relacja z użytkownikiem (Gość, który ocenił wydarzenie)
     *
     * @return BelongsTo<User, Review>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacja z wydarzeniem (wydarzenie, które zostało ocenione)
     *
     * @return BelongsTo<Event, Review>
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
