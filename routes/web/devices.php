<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Devices\ShowDevice;
use App\Actions\Devices\StoreDevice;
use App\Actions\Devices\GetDevices;
use App\Actions\Devices\DestroyDevice;
use App\Actions\Devices\GenerateNewPassword;

Route::middleware(['auth'])->group(function () {
    Route::get('/', GetDevices::class)->name('devices.get');
    Route::post('/', StoreDevice::class)->name('devices.store');
    Route::get('/{id}/show', ShowDevice::class)->name('devices.show');
    Route::patch('/{id}/password', GenerateNewPassword::class)->name('devices.updatePassword');
    Route::delete('/{id}', DestroyDevice::class)->name('devices.destroy');
});
