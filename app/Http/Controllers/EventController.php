<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Events\ApplyEmailEvent;
use App\Models\EventApplications;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
   protected $applicantData = [];

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $valudateData = $request->validate([
         'event_name' => 'required|string|max:255',
         'start_date' => 'required',
         'end_date' => 'required',
         'venue' => 'required|string|max:255',
         'lat' => 'required|numeric',
         'lng' => 'required|numeric',
         'event_image' => 'required|image|mimes:jpg,png,jpeg|max:10240',
      ]);

      if (!$valudateData) {
         // Session::flash('fail', 'Errors in your form submission');
         return Redirect::to("/events")->withFail('Errors in your form submission');
      }

      $event = Event::create([
         'name' => $request->event_name,
         'description' => $request->description,
         'venue' => $request->venue,
         'latitude' => $request->lat,
         'longitude' => $request->lng,
         'start_date' => new DateTime($request->start_date),
         'end_date' => new DateTime($request->end_date),
      ]);

      $event->addMedia($request->event_image)->toMediaCollection('event_image');

      if ($event) {
         return Redirect::to("/events")->withSuccess('Event successfully created.');;
      }
      else {
         return Redirect::to("/events")->withFail('Event could not be saved. Try again');;
      }
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Event $event
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Event $event)
   {
      $valudateData = $request->validate([
         'event_name' => 'required|string|max:255',
         'start_date' => 'required',
         'end_date' => 'required',
         'venue' => 'required|string|max:255',
         'lat' => 'required|numeric',
         'lng' => 'required|numeric',
         'event_image' => 'image|mimes:jpg,png,jpeg|max:10240',
      ]);
      if (!$valudateData) {
         return Redirect::to("/events")->withFail('Errors in your form submission');
      }

      $event = Event::firstWhere('id', $request->id);
      $event->name=$request->event_name;
      $event->description=$request->description;
      $event->venue=$request->venue;
      $event->latitude=$request->lat;
      $event->longitude=$request->lng;
      $event->start_date=new DateTime($request->start_date);
      $event->end_date=new DateTime($request->end_date);

      if(isset($request->event_image)){
         $event->addMedia($request->event_image)->toMediaCollection('event_image');
      }

      if($event->save()){
         return Redirect::to("/events")->withSuccess('Event successfully updated.');;
      } else {
         return Redirect::to("/events")->withFail('Event could not be saved. Try again');;
      }

   }

   public function apply(Request $request)
   {
      $application = EventApplications::firstWhere('id', $request->formId);
      if($request->uid){
         $user = User::findOrFail($request->userId);
      }
      else {
         $user = auth()->user();
      }
      $params = $request->all();
      unset($params['_token']);
      unset($params['uid']);
      unset($params['formId']);
      // $formId = $request->formId;
      
      if ($application->applicants->contains($user)) {
         return Redirect::back()->withFail('You have Already Registered!');
      }
      else {
         $counterStart = $application->applicants()->count();
         $this->getFieldValue($params);
         // dd($this->applicantData);
         // $application->applicants()->attach($user->id, ['form_data'=> json_encode($this->applicantData)]);
         $application->applicants()->attach($user->id, ['form_data'=> $this->applicantData]);
         $counterEnd = $application->applicants()->count();
         if($counterEnd > $counterStart)
         {
            // send email to user email about the event
            event(new ApplyEmailEvent($application, $user));
            return Redirect::back()->withSuccess('You have Successfully Registered!');
         }else {
            return Redirect::back()->withFail('Your application was not Successful!');
         }
      }
   }

   protected function getFieldValue($params)
   {
      foreach ($params as $key => $param) {
         $this->applicantData = array_replace($this->applicantData, [str_replace("_", " ", strtolower( $key )) => $param]);
      }
   }

}
