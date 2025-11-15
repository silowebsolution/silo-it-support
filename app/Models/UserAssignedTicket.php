<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $user_ticket_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\UserTicket $userTicket
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAssignedTicket whereUserTicketId($value)
 * @mixin \Eloquent
 */
class UserAssignedTicket extends Model
{
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userTicket(): BelongsTo
    {
        return $this->belongsTo(UserTicket::class);
    }
}
