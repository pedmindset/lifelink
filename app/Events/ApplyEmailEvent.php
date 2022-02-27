<?php

namespace App\Events;

use App\Models\EventApplications;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApplyEmailEvent
{
   use Dispatchable, InteractsWithSockets, SerializesModels;

   public $applications;
   public $user;

   /**
    * Create a new event instance.
    *
    * @return void
    */
   public function __construct(EventApplications $eventApplications, User $user)
   {
      $this->applications = $eventApplications;
      $this->user = $user;
   }

   /**
    * Get the channels the event should broadcast on.
    *
    * @return \Illuminate\Broadcasting\Channel|array
    */
   public function broadcastOn()
   {
      return new PrivateChannel('application_user_email');
   }
}
