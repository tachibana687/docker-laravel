<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\DictionaryController;
use App\Http\Controllers\Api\CreatureController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::resource('post', PostController::class)->only([
        'show', 'store'
    ]);

    Route::resource('dictionary', DictionaryController::class)->except([
        'create', 'edit'
    ]);

    Route::resource('creature', CreatureController::class)->only([
        'show', 'update', 'destroy'
    ]);
});