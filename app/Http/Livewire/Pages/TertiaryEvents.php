<?php

namespace App\Http\Livewire\Pages;

use App\Models\Event;
use Livewire\Component;

class TertiaryEvents extends Component
{
   public $events, $eventId;

   public function render()
   {
     
      $this->events = Event::latest()->get();
      return view('livewire.pages.tertiary-events');
   }

   public function mount()
   {
   }

}
