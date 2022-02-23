<?php

namespace App\Http\Livewire\Pages;

use App\Models\Event;
use Livewire\Component;

class EventDetail extends Component
{
   public $event, $formId, $eventId;
   public $applyMode = false;

   public function render()
   {
      return view('livewire.pages.event-detail');
   }

   public function mount($eventId)
   {
      $this->eventId = $eventId;
      $this->event = Event::firstWhere('id', $this->eventId);
   }

   public function applyForm($id){
      $this->formId = $id;
      $this->applyMode = true;
      // dd($this->formId);
   }
}
