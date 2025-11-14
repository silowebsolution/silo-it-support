# Local Development

## Requirements

- PHP: ^8.2
- MySql: ^8
- Laravel 11
- Vite.js
- Node.js ^18
- Filament 3
- Spatie Media library
- Spatie Roles and permittions

## Local Installation Guide

- go to folder where you want to install project and run script below:
```shell
git clone "repository url"
```
- enter in folder

```shell
cd /directory name
```
- Install php dependencies
```shell
composer install
```
- copy .env file
```shell
cp .env.example .env
```
- Generate App key
```shell
php artisan key:generate
```
- Install javascript dependencies
```shell
npm install & npm run dev
```

- create mysql database
```shell
mysql -u your_db_user_name -p your_db_user_password
```

```shell
CREATE DATABASE database_name_for_this_app
```
- update .env database credentials

- Migrate databases (if you need fresh db add :fresh to command)
```shell
php artisan migrate --seed
```
- before you start server clear cache by command:
```shell
php artisan optimize:clear
```
- start local server
```shell
php artisan serve
```

### Before you commit and push changes run tests
```shell
php artisan test
```

## Media Files
If media files does not load:

- optional (composer should install it automatically )
```shell
composer require "spatie/laravel-medialibrary"

```
- publish spatie/medialibrary config and migrations
- documentation: [Spatie/Medialibrary](https://spatie.be/docs/laravel-medialibrary/v11/installation-setup).

```shell
php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="medialibrary-migrations"
php artisan migrate
```

- link storage:
```shell
php artisan storage:link
```
- If images does not load, change app url in env file to: "APP_URL=http://127.0.0.1:8000"


## Documentation
- Documentation extension: [laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
- to create Model documentation run code:

```shell
php artisan ide-helper:models
```

# Testing
- if you need dummy data migrations you can add them here: App\Console\Commands\DummyData
- to generate dummy data run command:

```shell
php artisan dummy:data
```

- url: [Admin login](127.0.0.1:8000/admin)
- test users:admin@admin.com
- test pass:admin@admin.com


- url [Lecturer login](127.0.0.1:8000/lecturer)
- test users:lecturer@lecturer.com
- test pass:lecturer@lecturer.com

## Learning Resource

- [Filament Documentation](https://filamentphp.com/docs)
- [Filament Video Resource](https://www.youtube.com/watch?v=_jcf-TulHfU&list=PLqDySLfPKRn6fgrrdg4_SmsSxWzVlUQJo)
- [laravel-ide-helper](https://www.youtube.com/watch?v=Z5PVkRCu_Ww)

