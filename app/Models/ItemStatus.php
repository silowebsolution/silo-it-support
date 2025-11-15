<?php

namespace App\Models;

use App\Models\Traits\HasTranslatedName;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ItemStatus extends Model
{
    use HasTranslations;

    public array $translatable = ['name'];

    protected $casts = [
        'name' => 'array'
    ];

    protected $guarded = ['id'];
}
