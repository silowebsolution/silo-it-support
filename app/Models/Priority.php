<?php

namespace App\Models;

use App\Models\Traits\HasTranslatedName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserTicket> $userTickets
 * @property-read int|null $user_tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Priority whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Priority extends Model
{
    use HasTranslatedName;

    protected $fillable = [
        'name',
    ];

    public function userTickets(): HasMany
    {
        return $this->hasMany(UserTicket::class);
    }
}
