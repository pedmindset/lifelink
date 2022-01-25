<?php

use App\Http\Controllers\Api\AluminiaController;
use App\Http\Controllers\Api\ConferenceController;
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

// Route::get('/mobile/login', [App\Http\Controllers\Api\AuthController::class, 'loginAction']);
Route::apiResource('conferences', ConferenceController::class);
Route::apiResource('aluminias', AluminiaController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

