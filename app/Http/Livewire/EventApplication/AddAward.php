<?php

namespace App\Http\Livewire\EventApplication;

use App\Models\Award;
use App\Models\Event;
use Livewire\Component;

class AddAward extends Component
{
   public $eventId, $awards;
   public function render()
   {
      $this->awards = Award::all();
      return view('livewire.event-application.add-award');
   }

   public function mount($eventId)
   {
      $this->eventId = $eventId;
   }

   public function addAward($id)
   {
      $event = Event::firstWhere('id', $this->eventId);
      $event->attach($id);
   }
}
