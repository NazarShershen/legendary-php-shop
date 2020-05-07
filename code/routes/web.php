<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ArtifactController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('artifacts')->name('artifacts.')->group(function () {
    Route::get('', [ArtifactController::class, 'index'])->name('index');
    Route::get('new', [ArtifactController::class, 'create'])->name('create');
    Route::post('', [ArtifactController::class, 'store'])->name('store');
});
