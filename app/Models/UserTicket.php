<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $user_id
 * @property int $status_id
 * @property int|null $priority_id
 * @property string $label
 * @property string|null $ai_recommendation
 * @property int|null $was_ai_correct
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Priority|null $priority
 * @property-read \App\Models\Status $status
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserAssignedTicket> $userAssignedTickets
 * @property-read int|null $user_assigned_tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereAiRecommendation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTicket whereWasAiCorrect($value)
 * @mixin \Eloquent
 */
class UserTicket extends Model
{
    protected $guarded = ['id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function priority(): BelongsTo // Added this relationship
    {
        return $this->belongsTo(Priority::class);
    }

    public function userAssignedTickets(): HasMany
    {
        return $this->hasMany(UserAssignedTicket::class);
    }

    public function userTicketItem(): HasMany
    {
        return $this->hasMany(UserTicketItem::class);
    }
}
