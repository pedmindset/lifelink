<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AluminiaResource;
use App\Models\aluminia;
use App\Models\Profile;
use Illuminate\Http\Request;

class AluminiaController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $aluminias = Profile::where('aluminia', 1)->get();
      return AluminiaResource::collection($aluminias);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\aluminia  $aluminia
    * @return \Illuminate\Http\Response
    */
   public function show(aluminia $aluminia)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\aluminia  $aluminia
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, aluminia $aluminia)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\aluminia  $aluminia
    * @return \Illuminate\Http\Response
    */
   public function destroy(aluminia $aluminia)
   {
      //
   }
}
