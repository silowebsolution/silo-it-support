<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\App;

trait HasTranslatedName
{
    /**
     * Get the translated name attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if (!isset($attributes['name'])) {
                    return null;
                }

                $nameData = json_decode($attributes['name'], true);

                if (json_last_error() !== JSON_ERROR_NONE) {
                    return $attributes['name'];
                }

                return $nameData[App::getLocale()] ?? $nameData[config('app.fallback_locale')] ?? null;
            }
        );
    }
}
