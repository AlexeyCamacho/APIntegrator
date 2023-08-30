<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Errors\CreateActiveErrors;
use App\Actions\Errors\SyncActiveErrors;
use App\Actions\Errors\DeleteActiveErrors;
use App\Actions\Errors\DeleteAllActiveErrors;


Route::middleware(['auth:api', 'last_access'])->group(function () {
    Route::middleware('containsErrors')->group(function () {
        Route::post('/', CreateActiveErrors::class)->name('errors.createActiveErrors');
        Route::patch('/', SyncActiveErrors::class)->name('errors.syncActiveErrors');
        Route::put('/', DeleteActiveErrors::class)->name('errors.deleteActiveErrors');
    });
    Route::delete('/', DeleteAllActiveErrors::class)->name('errors.deleteAllActiveErrors');
});
