<?php

use App\Livewire\ClientPage;
use App\Livewire\ClientsPage;
use App\Livewire\IndexPage;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexPage::class)->name('index');
Route::get('clients', ClientsPage::class)->name('index');
Route::get('client/{id}', ClientPage::class)->name('index');
