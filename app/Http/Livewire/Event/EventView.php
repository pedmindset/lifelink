<?php

namespace App\Http\Livewire\Event;

use App\Models\Award;
use App\Models\Event;
use Livewire\Component;
use App\Models\EventApplications;

class EventView extends Component
{
    public $event;
    public $eventId;
    public $data;
    public $schema;
    public $detailTab = false, $formTab = false, $officialTab = false, $awardTab= false, $addAwardMode=false, $addOfficialMode= false, $formCreateMode =false;

   public function render()
   {
      return view('livewire.event.event-view');
   }



   public function mount()
   {

       $this->event = Event::firstWhere('id', request()->id);
       $this->detailTab = true;
   }

   public function hydrate()
   {
        $this->emit('setDisplayLoading', false);
   }

   public function getEventProperty()
   {
        $this->event = Event::firstWhere('id', $this->event->id);
   }

   public function switchtab($value){
      switch ($value) {
         case 1:
            $this->formTab = false;
            $this->officialTab = false;
            $this->awardTab = false;
            $this->detailTab = true;
            break;
         case 2:
            $this->detailTab = false;
            $this->officialTab = false;
            $this->awardTab = false;
            $this->formTab = true;
            break;
         case 3:
            $this->detailTab = false;
            $this->formTab = false;
            $this->awardTab = false;
            $this->officialTab = true;
            break;
         case 4:
            $this->detailTab = false;
            $this->officialTab = false;
            $this->formTab = false;
            $this->awardTab = true;
            break;
         default:
            $this->formTab = false;
            $this->officialTab = false;
            $this->awardTab = false;
            $this->detailTab = false;
            break;
      }

   }

   public function showForm($formId)
   {
        $this->emit('editForm', $formId);
   }

   public function deleteForm($formId)
   {
        $this->emit('deleteForm', $formId);
   }
}
