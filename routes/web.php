<?php

use App\Http\Controllers\UrlController;
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

Route::name('url.')
    ->controller(UrlController::class)
    ->group(function () {
        Route::name('index')->get('/', 'index');
        Route::name('shorten')->post('/shorten', 'shorten');
        Route::name('expand')->get('/{url:uid}', 'expand');
    });
