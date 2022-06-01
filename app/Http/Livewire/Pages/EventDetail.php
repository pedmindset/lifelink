<?php

namespace App\Http\Livewire\Pages;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EventDetail extends Component
{
   public $event, $formId, $eventId;
   public $userId;
   public $access_denied = false;
   public $applyMode = false, $isMobile = false;


   protected $listeners = ['closeLoginAlert'];

   public function closeLoginAlert()
   {
        $this->applyMode = false;
        $this->access_denied = false;
   }

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
      if(Auth::check()){
           $this->formId = $id;
           $this->applyMode = true;
           // dd($this->formId);
      }

      $this->access_denied = true;

   }
}
