<?php

namespace App\Http\Livewire;

use App\Models\EventApplications;
use Livewire\Component;

class EventApplication extends Component
{
   public $data, $name, $description, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false;

   public function render()
   {
      $this->data = EventApplications::all();
      return view('livewire.event_application.event-application');
   }

   public function delete($id)
   {
      $record = EventApplications::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selected_id) {
         $record = EventApplications::firstWhere('id', $this->selected_id);
         $record->delete();

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully Deleted!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'warning',
            'message'=> "EventApplications does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }
}
