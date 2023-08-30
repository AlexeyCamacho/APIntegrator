<?php


use Illuminate\Support\Facades\Route;

use App\Actions\Statuses\GetStatuses;
use App\Actions\Statuses\StoreStatus;
use App\Actions\Statuses\DestroyStatus;


Route::middleware(['auth'])->group(function () {
    Route::get('/{device_id}', GetStatuses::class)->name('statuses.get');
    Route::post('/{device_id}', StoreStatus::class)->name('statuses.store');
    Route::delete('/{id}', DestroyStatus::class)->name('statuses.destroy');
});
