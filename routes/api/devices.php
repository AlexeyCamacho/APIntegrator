<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Devices\UpdateLastAccess;


Route::middleware(['auth'])->group(function () {
    Route::get('/', UpdateLastAccess::class)->name('devices.get');
});
