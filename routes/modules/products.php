<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Products\{ProductIndex,  ProductCrud};

Route::middleware(['auth'])->prefix('products')->name('products.')->group(function () {
    Route::get('/', ProductIndex::class)->name('index');
    Route::get('/create', ProductCrud::class)->name('create');
    Route::get('/{product}/edit', ProductCrud::class)->name('edit');
});

