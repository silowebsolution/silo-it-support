<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_ticket_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicketItem whereUserTicketId($value)
 * @mixin \Eloquent
 */
class UserTicketItem extends Model
{
    protected $guarded = ['id'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
    public function userTicket(): BelongsTo
    {
        return $this->belongsTo(UserTicket::class);
    }
}
