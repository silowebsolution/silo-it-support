<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserItem whereUserId($value)
 * @mixin \Eloquent
 */
class UserItem extends Model
{
    //
}
