<?php

use App\Livewire\Customers\CustomerCrud;
use App\Livewire\Customers\CustomerIndex;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('customers')->name('customers.')->group(function () {
    Route::get('/', CustomerIndex::class)->name('index');
    Route::get('/create', CustomerCrud::class)->name('create');
    Route::get('/{customer}/edit', CustomerCrud::class)->name('edit');
});
