<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class ComponentAnnouncement extends Component
{
   public $data, $name, $description, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false;

   public function render()
   {
      $this->data = Announcement::all();
      return view('livewire.announcement.component-announcement');
   }

   public function delete($id)
   {
      $record = Announcement::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selected_id) {
         $record = Announcement::firstWhere('id', $this->selected_id);
         $record->delete();

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully Deleted!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'warning',
            'message'=> "Announcement does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }
}
