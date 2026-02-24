<?php

use App\Livewire\Products\ProductCrud;
use App\Livewire\Products\ProductIndex;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('products')->name('products.')->group(function () {
    Route::get('/', ProductIndex::class)->name('index');
    Route::get('/create', ProductCrud::class)->name('create');
    Route::get('/{product}/edit', ProductCrud::class)->name('edit');
});
