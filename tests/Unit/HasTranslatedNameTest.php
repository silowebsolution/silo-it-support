<?php

use App\Models\Traits\HasTranslatedName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// Dummy model for testing the trait, mimicking the actual Status model
class TradableModel extends Model
{
    use HasTranslatedName;

    protected $table = 'tradable_models';
    protected $guarded = [];
    public $timestamps = false;

    // No $casts property, so the trait will receive a raw JSON string from the DB.
}

// Setup the database schema for the dummy model
beforeEach(function () {
    Schema::create('tradable_models', function ($table) {
        $table->id();
        $table->json('name')->nullable();
    });
});

afterEach(function () {
    Schema::dropIfExists('tradable_models');
});

test('it returns the correct translation when locale exists', function () {
    App::setLocale('en');
    $model = TradableModel::create(['name' => ['en' => 'English Name', 'es' => 'Spanish Name']]);

    expect($model->refresh()->name)->toBe('English Name');
});

test('it returns the fallback translation when locale does not exist', function () {
    App::setLocale('fr');
    Config::set('app.fallback_locale', 'en');
    $model = TradableModel::create(['name' => ['en' => 'English Name', 'es' => 'Spanish Name']]);

    expect($model->refresh()->name)->toBe('English Name');
});

test('it returns null when no matching locale or fallback is found', function () {
    App::setLocale('fr');
    Config::set('app.fallback_locale', 'de');
    $model = TradableModel::create(['name' => ['en' => 'English Name', 'es' => 'Spanish Name']]);

    expect($model->refresh()->name)->toBeNull();
});

test('it returns the raw string if the name attribute is not valid json', function () {
    // Manually insert invalid JSON to bypass Eloquent's automatic encoding
    $id = DB::table('tradable_models')->insertGetId(['name' => 'Not a JSON string']);
    $model = TradableModel::find($id);

    expect($model->name)->toBe('Not a JSON string');
});

test('it returns null if the name attribute is null', function () {
    $model = TradableModel::create(['name' => null]);

    expect($model->refresh()->name)->toBeNull();
});
