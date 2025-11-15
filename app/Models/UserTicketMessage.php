<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_ticket_id
 * @property int $user_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketMessage whereUserTicketId($value)
 * @mixin \Eloquent
 */
class UserTicketMessage extends Model
{
    protected $guarded = ['id'];

    public function userTicket(): BelongsTo
    {
        return $this->belongsTo(UserTicket::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
