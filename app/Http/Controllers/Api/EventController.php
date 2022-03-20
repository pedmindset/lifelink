<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Events\ApplyEmailEvent;
use App\Models\EventApplications;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
   use ResponseTrait;

   public function getLatest()
   {
      $event = Event::latest()->take(1)->get();
      return $this->success($event, 'Success');
   }

   public function getEvents(Request $request)
   {
      $date = Carbon::parse($request->date);
      $events = Event::with(['applications'])->whereMonth('start_date', $date->month)->whereYear('start_date', $date->year)->get();

      return $this->success($events, 'Success');
   }

   public function applyForm(Request $request){
      
      // return $request;
      $application = EventApplications::firstWhere('id', $request->formId);

      if ($application->applicants->contains(auth()->user())) {
         return $this->fail('Application unsuccessful','You have already register for this event');
      }

      $attach = $application->applicants()->attach(auth()->user()->id, ['form_data'=> json_encode($request->applicantData)]);

      if($attach){
         // send email to user email about the event
         event(new ApplyEmailEvent($application, auth()->user()));
         return $this->success('Application success','Successfully applied!');
      } else {
         return $this->fail('Application unsuccessful','Application unsuccessful!, try again');
      }
   }

   public function getMyEvents() {
      $eventApplications = auth()->user()->applications;
      $events = array();
      foreach($eventApplications as $eventApp){
         $events[] = $eventApp->event;
      }
      return $this->success($events, 'Success');
   }

   public function getEventUrl(Request $request)
   {
      $user = request()->user();
      // return $request;
      $signUrl = URL::temporarySignedRoute(
         'mobile.event.register', now()->addMinutes(30), ['user' => $user->id, 'eventId' => $request->id]
      );

      return $this->success($signUrl, 'Successful');
   }

   public function getformUrl(Request $request)
   {
      $user = request()->user();
      $signUrl = URL::temporarySignedRoute(
         'mobile.event.form.register', now()->addMinutes(30), ['user' => $user, 'event' => $request->eventId, 'form' => $request->formId]
      );

      return $this->success($signUrl, 'Successful');
   }
}
