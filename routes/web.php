<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::any( '/{any}', function(){
    return view('main');
})->where('any', '^((?!api\/).)*$')->middleware('auth');

Route::prefix("api")->group(function () {
    Route::prefix("devices")->group(function () {
        require __DIR__.'/devices.php';
    });
});
