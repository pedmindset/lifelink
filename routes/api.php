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

Route::get('/mobile/login', [App\Http\Controllers\Api\AuthController::class, 'loginAction']);
Route::get('/mobile/register', [App\Http\Controllers\Api\AuthController::class, 'registerAction']);

Route::group(['middleware' => ['auth:sanctum']], function($route) {
    $route->post('mobile/logout', [App\Http\Controllers\Api\AuthController::class, 'logoutAction']);
    $route->get('mobile/conferences', [App\Http\Controllers\Api\ConferenceController::class, 'getConferences']);
    $route->get('mobile/get-conferences', [App\Http\Controllers\Api\ConferenceController::class, 'getMemberConference']);
    $route->get('mobile/get-latest-conference', [App\Http\Controllers\Api\ConferenceController::class, 'getLatest']);
    $route->get('mobile/register-conference', [App\Http\Controllers\Api\ConferenceController::class, 'registerMember']);
});
