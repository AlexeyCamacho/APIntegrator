<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Devices\UpdateLastAccess;


Route::middleware(['auth:api', 'last_access'])->group(function () {
    Route::patch('/', UpdateLastAccess::class)->name('devices.updateLastAccess');
});
