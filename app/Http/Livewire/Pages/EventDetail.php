<?php

namespace App\Http\Livewire\Pages;

use App\Models\Event;
use Livewire\Component;

class EventDetail extends Component
{
   public $event, $formId, $eventId;
   public $userId;
   public $applyMode = false, $isMobile = false;

   public function render()
   {
      return view('livewire.pages.event-detail');
   }

   public function mount($eventId, $formId, $userId)
   {
      $this->eventId = $eventId;
      $this->event = Event::firstWhere('id', $this->eventId);
      if($formId != null){
         $this->event = Event::firstWhere('id', $this->eventId);
         if($userId != null){
            $this->isMobile = true;
         }
         $this->userId = $userId;
         $this->applyForm($formId);
      }
   }

   public function applyForm($id){
      $this->formId = $id;
      $this->applyMode = true;
      // dd($this->formId);
   }
}
