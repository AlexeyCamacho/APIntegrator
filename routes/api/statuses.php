<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Statuses\CreateActiveStatuses;
use App\Actions\Statuses\SyncActiveStatuses;
use App\Actions\Statuses\DeleteActiveStatuses;
use App\Actions\Statuses\DeleteAllActiveStatuses;


Route::middleware(['auth:api', 'last_access'])->group(function () {
    Route::middleware('containsStatuses')->group(function () {
        Route::post('/', CreateActiveStatuses::class)->name('statuses.createActiveErrors');
        Route::patch('/', SyncActiveStatuses::class)->name('statuses.syncActiveErrors');
        Route::put('/', DeleteActiveStatuses::class)->name('statuses.deleteActiveErrors');
    });
    Route::delete('/', DeleteAllActiveStatuses::class)->name('statuses.deleteAllActiveErrors');
});
