<?php

use App\Http\Controllers\Api\V1\Film\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('films')->group(function () {
    Route::get('/', [FilmController::class, 'index']);
    Route::post('/', [FilmController::class, 'store']);
    Route::get('/{slug}', [FilmController::class, 'show']);
});
