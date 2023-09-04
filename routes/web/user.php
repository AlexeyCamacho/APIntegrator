<?php


use Illuminate\Support\Facades\Route;

use App\Actions\Users\GetUser;


Route::middleware(['auth'])->group(function () {
    Route::get('/', GetUser::class)->name('user.get');
});
