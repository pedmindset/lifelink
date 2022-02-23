<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

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
    * Display the specified resource.
    *
    * @param  \App\Models\Event $event
    * @return \Illuminate\Http\Response
    */
   public function show(Event $event)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Event $event
    * @return \Illuminate\Http\Response
    */
   public function edit(Event $event)
   {
      //
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
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Event $event
    * @return \Illuminate\Http\Response
    */
   public function destroy(Event $event)
   {
      //
   }
}
