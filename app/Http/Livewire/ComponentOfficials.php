<?php

namespace App\Http\Livewire;

use App\Models\Official;
use Livewire\Component;

class ComponentOfficials extends Component
{
   public $data, $name, $description, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false;

   public function render()
   {
      $this->data = Official::all();
      return view('livewire.official.component-officials');
   }

   public function delete($id)
   {
      $record = Official::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selected_id) {
         $record = Official::firstWhere('id', $this->selected_id);
         $record->delete();

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully Deleted!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'warning',
            'message'=> "Official does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }
}
