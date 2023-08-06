<?php

use App\Http\Controllers\Frontend\Film\FilmController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('films.index');
});

Route::prefix('films')->group(function () {
    Route::get('/', [FilmController::class, 'index'])->name('films.index');
    Route::get('/{slug}', [FilmController::class, 'show'])->name('films.show');
    Route::post('/{id}/comments', [FilmController::class, 'storeComments'])->name('films.comments.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
