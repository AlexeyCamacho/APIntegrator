<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Devices\StoreDevice;

Route::middleware(['auth'])->group(function () {
    //Route::get('/', 'get')->name('devices.get');
    Route::post('/', StoreDevice::class)->name('devices.store');
//    Route::get('/{id}/show', 'show')->name('devices.show');
//    Route::get('/{id}/edit', 'edit')->name('devices.edit');
//    Route::put('/{id}', 'update')->name('devices.update');
//    Route::delete('/{id}', 'destroy')->name('devices.destroy');

});
