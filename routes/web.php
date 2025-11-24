<?php

use App\Http\Controllers\RedirectDownloadLinkController;
use App\Livewire\ChoseDevice;
use App\Livewire\DemoPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Help;

Route::get('/login', Login::class)->name('login');
Route::get('/help', Help::class)->middleware('auth')->name('help');

Route::get('/', DemoPage::class)->name('demo-page');
Route::get('download-app', RedirectDownloadLinkController::class)->name('download.app');
Route::get('chose-device', ChoseDevice::class)->name('chose.device');
