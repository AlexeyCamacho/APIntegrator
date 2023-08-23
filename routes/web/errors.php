<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Errors\GetErrors;
use App\Actions\Errors\StoreError;
use App\Actions\Errors\DestroyError;


Route::middleware(['auth'])->group(function () {
    Route::get('/{device_id}', GetErrors::class)->name('errors.get');
    Route::post('/{device_id}', StoreError::class)->name('errors.store');
    Route::delete('/{id}', DestroyError::class)->name('errors.destroy');
});
