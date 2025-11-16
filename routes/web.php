<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Help;

Route::get('/login', Login::class)->name('login');
Route::get('/help', Help::class)->middleware('auth')->name('help');

Route::get('/', function () {
    return redirect('/login');
});
