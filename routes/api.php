<?php

use App\Http\Controllers\Api\V1\timestamp;
use App\Http\Controllers\Api\V1\UrlController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\whoami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::apiResource('timestamp', timestamp::class);
    Route::apiResource('whoami', whoami::class);
    Route::apiResource('shorturl', UrlController::class)->parameter('shorturl', 'url');
    Route::apiResource('users', UserController::class);
    Route::post('users/{id}/exercises', [UserController::class, 'addExercise']);
    Route::get('users/{id}/logs', [UserController::class, 'getLogs']);
});