<?php

namespace App\Http\Controllers\Api;

use App\Models\Conference;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;

class ConferenceController extends Controller
{
   use ResponseTrait;
   
   public function getConferences()
   {
      $conference = Conference::all();
      return $this->success($conference, 'Conference registration was successful');
   }

   public function getMemberConference()
   {
      $user = request()->user();
      $user->conferences;

   }

   public function getLatest()
   {
      $user = request()->user();
      $user->conferences;
   }
   public function registerMember(Request $request)
   {
      $conference = Conference::firstWhere('id', $request->conference_id);
      $conference->attach(request()->user()->id);

      return $this->success('Registered', 'Conference registration was successful');
   }
   
}
