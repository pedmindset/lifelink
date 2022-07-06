<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class ComponentMembers extends Component
{
   public $data, $name, $description, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false;

   public function render()
   {
      $this->data = Member::latest()->get();
      return view('livewire.member.component-members');
   }

   public function delete($id)
   {
      $record = Member::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selected_id) {
         $record = Member::firstWhere('id', $this->selected_id);
         $record->delete();

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully Deleted!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'warning',
            'message'=> "Member does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }
}
