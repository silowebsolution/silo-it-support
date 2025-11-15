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
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ItemStatus whereLocales(string $column, array $locales)
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
