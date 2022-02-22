<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventApplications;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
   use ResponseTrait;

   public function getLatest()
   {
      $event = Event::last();
      return $this->success($event, 'Success');
   }

   public function getEvents(Request $request)
   {
      $date = Carbon::parse($request->date);
      $events = Event::whereMonth('created_at', $date('m'))->whereYear('created_at', $date('Y'))->get();

      return $this->success($events, 'Success');
   }

   public function appyForm(Request $request){
      $application = EventApplications::firstWhere('id', $request->formId);
      
      if($application->applicants()->attach(auth()->user()->id, ['form_data'=> json_encode($request->applicantData)])){
         return $this->success('Application success','Successfully applied!');
      }else {
         return $this->success('Application unsuccessful','Application unsuccessful!, try again');
      }
   }
}
