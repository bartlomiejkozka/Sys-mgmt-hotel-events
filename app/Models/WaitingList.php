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
     * @return BelongsTo<User, WaitingList>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Event, WaitingList>
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
