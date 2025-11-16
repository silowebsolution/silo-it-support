<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property int $id
 * @property int $item_status_id
 * @property int $location_id
 * @property int|null $user_id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ItemStatus $itemStatus
 * @property-read \App\Models\Location $location
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereItemStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Item whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserTicketItem> $userTicketItem
 * @property-read int|null $user_ticket_item_count
 * @mixin \Eloquent
 */
class Item extends Model
{
   protected $guarded = ['id'];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function itemStatus(): BelongsTo
    {
        return $this->belongsTo(ItemStatus::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function userTicketItem(): HasMany
    {
        return $this->hasMany(UserTicketItem::class);
    }
}
