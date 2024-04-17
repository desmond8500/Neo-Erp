<?php

use App\Livewire\ClientPage;
use App\Livewire\ClientsPage;
use App\Livewire\IndexPage;
use App\Livewire\ProfilePage;
use App\Livewire\ProjetPage;
use App\Livewire\SettingsPage;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexPage::class)->name('index');
Route::get('clients', ClientsPage::class)->name('clients');
Route::get('client/{client_id}', ClientPage::class)->name('client');
Route::get('projet/{projet_id}', ProjetPage::class)->name('projet');
Route::get('profile/{user_id}', ProfilePage::class)->name('profile');
Route::get('settings/{user_id}', SettingsPage::class)->name('settings');
