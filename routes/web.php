<?php

use Illuminate\Http\Request;
use App\Http\Livewire\Error\Err404;
use App\Http\Livewire\Error\Err500;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ComponentUsers;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ComponentMembers;
use App\Http\Livewire\ComponentPayment;
use App\Http\Livewire\EventApplication;
use App\Http\Livewire\ComponentOfficials;
use App\Http\Livewire\ComponentConference;
use App\Http\Livewire\Pages\TertiaryEvents;
use App\Http\Livewire\ComponentAwardCitation;
use App\Models\Event;

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
   // $u = Auth::user();
   // dd($u->roles[0]['name']);
   return view('welcome');
});
require __DIR__.'/auth.php';

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');

Route::middleware('auth')->group(function ($route) {
   $route->get('/home', function () {
      return view('welcome');
   });
   $route->get('/profile', function () {
      return view('pages.profile');
   })->name('profile');
   $route->get('/settings', function () {
      return view('welcome');
   })->name('settings');
   $route->get('/dashboard', function() {
      return view('admin.dashboard');
   })->name('dashboard');

   // main default
   $route->get('/tertiary-events/{id?}', function(Request $request) {
      return view('pages.events', ['eventId'=> $request->id]);
   })->name('events.tertiary');

   $route->get('/users', ComponentUsers::class)->name('users');
   $route->get('/events', ComponentConference::class)->name('events');
   $route->get('/event-form', EventApplication::class)->name('event.form');
   $route->get('/officials', ComponentOfficials::class)->name('officials');
   $route->get('/members', ComponentMembers::class)->name('members');
   $route->get('/awards-citations', ComponentAwardCitation::class)->name('awards.citations');
   $route->get('/payments', ComponentPayment::class)->name('payments');
});
