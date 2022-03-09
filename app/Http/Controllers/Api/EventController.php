<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Events\ApplyEmailEvent;
use App\Models\EventApplications;
use App\Http\Traits\ResponseTrait;
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
      $date = Carbon::parse($request->date)->format('Y-m-d');
      // $events = Event::with(['applications'])->whereMonth('created_at', $date->month)->whereYear('created_at', $date->year)->get();

      $events = Event::whereYear('created_at', $date->year)->get();

      // return json_encode(['month' => $date->month, 'year' => $date->year]);

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
}
