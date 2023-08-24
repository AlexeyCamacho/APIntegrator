<?php

use Illuminate\Support\Facades\Route;

use App\Actions\Errors\CreateActiveErrors;


Route::middleware(['auth:api', 'last_access', 'containsErrors'])->group(function () {
    Route::post('/', CreateActiveErrors::class)->name('errors.createActiveErrors');
});
