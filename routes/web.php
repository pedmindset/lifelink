<?php

use App\Http\Controllers\EventController;
use App\Http\Livewire\ComponentAnnouncement;
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
use App\Http\Livewire\DashboardView;
use App\Http\Livewire\Event\EventView;
use App\Http\Livewire\EventApplicants;
use App\Http\Livewire\Fees;
use App\Http\Livewire\SettingPage;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Tag;

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
   return view('welcome');
})->name('home');
Route::get('/about', function () {
   return view('pages.about');
})->name('about');
require __DIR__.'/auth.php';

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');

Route::middleware('auth')->group(function ($route) {
   $route->get('/home', function () {
      return view('welcome');
   });
   $route->get('/profile', function () {
      $generalAnnouncement = Tag::firstWhere('id', 2)->announcements;
      $aluminiaAnnouncement = Tag::firstWhere('id', 3)->announcements;
      $eventAnnouncement = Tag::firstWhere('id', 1)->announcements;
      return view('pages.profile', ['general' => $generalAnnouncement, 'aluminia' => $aluminiaAnnouncement, 'events' => $eventAnnouncement]);
   })->name('profile');

   $route->get('/my-profile', function () {
      return view('pages.profile');
   })->name('admin.profile');

   $route->get('/upcoming-events/{id?}', function(Request $request) {
      return view('pages.events', ['eventId'=> $request->id]);
   })->name('events.tertiary');

   $route->get('/upcoming/event/{id}', function(Request $request) {
      return view('pages.event-detail', ['eventId' => $request->id]);
   })->name('events.detail');

   $route->get('/settings', function(Request $request) {
      return view('pages.settings');})->name('admin.settings');

   $route->get('/dashboard', DashboardView::class)->name('dashboard');
   $route->get('/users', ComponentUsers::class)->name('users');

   $route->get('/events', ComponentConference::class)->name('events');
   $route->get('/event/{id}', EventView::class)->name('event.view');
   $route->post('/event/create', [EventController::class, 'store'])->name('event.create');
   $route->post('/event/update', [EventController::class, 'update'])->name('event.update');
   // $route->get('/events/{option}/{id}', ComponentConference::class)->name('event');

   $route->get('/event-form', EventApplication::class)->name('event.form');
   $route->get('/applicants/{id}', EventApplicants::class)->name('event.applicants');
   $route->get('/fees', Fees::class)->name('fees');
   $route->get('/officials', ComponentOfficials::class)->name('officials');
   $route->get('/members', ComponentMembers::class)->name('members');
   $route->get('/awards-citations', ComponentAwardCitation::class)->name('awards.citations');
   $route->get('/announcements', ComponentAnnouncement::class)->name('announcements');
   $route->get('/payments', ComponentPayment::class)->name('payments');
});
