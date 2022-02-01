<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Models\EventApplications;
use Illuminate\Support\Collection;

class EventApplication extends Component
{
   public $formId, $data, $schema;

   public function render()
   {
      $this->data = EventApplications::firstWhere('id', $this->formId);
      $this->schema = json_decode($this->data->schema);
      return view('livewire.event_application.event-application');
   }

   public function mount()
   {
      $this->formId = request()->id;
   }

   public function delete($id)
   {
      $record = EventApplications::firstWhere('id', $id);
      // $this->deleteMode = true;
   }

   private function resetInput()
   {
      
   }

   public function store()
   {
      
   }
   
   public function edit($id)
   {
      $record = EventApplications::findOrFail($id);
      // $this->updateMode = true;
   }

   public function update()
   {
     
   }

   public function destroy()
   {
      
   }

   public function switchOption(){
   }

   public function addOption($value) {
      
   }

}
