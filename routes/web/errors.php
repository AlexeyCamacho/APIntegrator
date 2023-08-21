<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Errors\GetErrors;


Route::middleware(['auth'])->group(function () {
    Route::get('/{device_id}', GetErrors::class)->name('errors.get');
});
