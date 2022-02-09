<?php

namespace App\Http\Livewire\Pages;

use App\Models\Event;
use Livewire\Component;

class TertiaryEvents extends Component
{
   public $events,$event, $eventId, $formId;
   public $showMode = false, $applyMode = false;

   public function render()
   {
      if (isset($this->eventId)) {
         $this->event = Event::firstWhere('id', $this->eventId);
         $this->showMode = true;
      }
      else {
         $this->events = Event::all()->reverse();
      }
      return view('livewire.pages.tertiary-events');
   }

   public function mount($eventId)
   {
      $this->eventId = $eventId;
   }

   public function showItem($id){
      $this->eventId = $id;
      $this->event = Event::firstWhere('id', $this->eventId);
      // dd($this->event->fee);
      $this->showMode = true;
   }

   public function closeView() {
      $this->eventId = null;
      $this->event = null;
      $this->showMode = false;
   }

   public function applyForm($id){
      $this->formId = $id;
      $this->applyMode = true;
   }
}
