<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class TertiaryEvents extends Component
{
   public $eventId;
   public $showMode = false;

   public function render()
   {
      $this->eventId = 1;
      if (isset($this->eventId)) {
         $this->showMode = true;
      }
      return view('livewire.pages.tertiary-events');
   }

   public function mount($eventId)
   {
      $this->eventId = $eventId;
   }

   public function showItem($id){
      $this->eventId = $id;
      $this->showMode = true;

   }
}
