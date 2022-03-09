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

Route::post('/mobile/login', [App\Http\Controllers\Api\AuthController::class, 'loginAction']);
Route::post('/mobile/register', [App\Http\Controllers\Api\AuthController::class, 'registerAction']);

Route::get('mobile/event/current', [App\Http\Controllers\Api\EventController::class, 'getLatest']);
Route::get('mobile/events', [App\Http\Controllers\Api\EventController::class, 'getEvents']);

Route::group(['middleware' => ['auth:sanctum']], function($route) {
    $route->post('mobile/logout', [App\Http\Controllers\Api\AuthController::class, 'logoutAction']);
    $route->post('mobile/apply', [App\Http\Controllers\Api\EventController::class, 'applyForm']);
    $route->get('mobile/my-events', [App\Http\Controllers\Api\EventController::class, 'getMyEvents']);
});
