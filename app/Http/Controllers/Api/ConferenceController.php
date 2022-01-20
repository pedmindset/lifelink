<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConferenceResource;
use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      return ConferenceResource::collection(Conference::all());
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $company = Conference::create($request->validated());
      return new ConferenceResource($company);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Conference  $conference
    * @return \Illuminate\Http\Response
    */
   public function show(Conference $conference)
   {
      return new ConferenceResource($conference);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Conference  $conference
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Conference $conference)
   {
      $conference->update($request->validated());
      return new ConferenceResource($conference);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Conference  $conference
    * @return \Illuminate\Http\Response
    */
   public function destroy(Conference $conference)
   {
      $conference->delete();
      return response()->noContent();
   }
   
}
