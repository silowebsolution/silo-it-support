<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $item_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $image_name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereImageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ItemDetail extends Model
{
    //
}
