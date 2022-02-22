<?php

namespace App\Http\Controllers\Api;

use App\Models\Conference;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Event;

class ConferenceController extends Controller
{
   use ResponseTrait;
   
   public function getConferences()
   {
      $conference = Event::all();
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
      $conference = Event::firstWhere('id', $request->conference_id);
      $conference->attach(request()->user()->id);

      return $this->success('Registered', 'Conference registration was successful');
   }
   
}
