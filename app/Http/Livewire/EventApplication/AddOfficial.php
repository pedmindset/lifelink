<?php

namespace App\Http\Livewire\EventApplication;

use Livewire\Component;

class AddOfficial extends Component
{
   public $eventId;
   public function render()
   {
      return view('livewire.event-application.add-official');
   }

   public function mount($eventId)
   {
      $this->eventId = $eventId;
   }
}
