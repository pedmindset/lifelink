<?php

namespace App\Listeners;

use App\Events\ApplyEmailEvent;
use App\Mail\ApplyMailDigest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class ApplyEmailListener
{
   /**
    * Create the event listener.
    *
    * @return void
    */
   public function __construct()
   {
      //
   }

   /**
    * Handle the event.
    *
    * @param  ApplyEmailEvent  $event
    * @return void
    */
   public function handle(ApplyEmailEvent $event)
   {
      $user = $event->user;
      $applicationEvent = $event->applications;
      Mail::to($user->email, $user->name)->send(new ApplyMailDigest($applicationEvent));
   }
}
