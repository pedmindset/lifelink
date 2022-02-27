<?php

namespace App\Listeners;

use App\Events\ApplyEmailEvent;
use App\Mail\ApplyMailDigest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
      Mail::to($event->user->email, $event->user->name)->send(new ApplyMailDigest($event->event->eventApplications));
   }
}
