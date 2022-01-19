<?php

use Illuminate\Support\Facades\Auth;
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
   return view('welcome',[
      'form' => app('App\Forms\FirstForm')
   ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function ($route) {
   // Route::view('/{any}', 'dashboard')
   //  ->middleware(['auth'])
   //  ->where('any', '.*');
   $route->get('/{any?}', function () {
      return view('layouts.admin');
   });
   // $route->get('/dashboard', function ()
   // {
   //    return view('admin.dashboard',[
   //       'form' => app('App\Forms\FirstForm')
   //    ]);
   // });
});
