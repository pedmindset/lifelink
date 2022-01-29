<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class ComponentConference extends Component
{
   public $data, $name, $description, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false;

   public function render()
   {
      $this->data = Event::all();
      return view('livewire.conference.component-conference');
   }

   public function delete($id)
   {
      $record = Event::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selected_id) {
         $record = Event::firstWhere('id', $this->selected_id);
         $record->delete();

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully Deleted!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'warning',
            'message'=> "Event does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }
}
