<?php

use Illuminate\Support\Facades\Route;
use Okami101\LaravelAdmin\Http\Middleware\Impersonate;

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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::account();
    Route::impersonate();
    Route::upload();

    /**
     * API resources controllers
     */
    Route::apiResources([
        'users' => 'App\Http\Controllers\UserController',
        //
        'profiles' => 'App\Http\Controllers\ProfileController',
        'members' => 'App\Http\Controllers\MemberController',
        'conference' => 'App\Http\Controllers\ConferenceController',
        'conference applications' => 'App\Http\Controllers\ConferenceApplicationController',
        'conference officials' => 'App\Http\Controllers\ConferenceOfficialController',
        'conference schedules' => 'App\Http\Controllers\ConferenceScheduleController',
        'payments' => 'App\Http\Controllers\PaymentController',
        'award and citations' => 'App\Http\Controllers\AwardAndCitationController',
        'announcements' => 'App\Http\Controllers\AnnouncementController',
        'aluminia' => 'App\Http\Controllers\AluminiaController',
    ]);
});
