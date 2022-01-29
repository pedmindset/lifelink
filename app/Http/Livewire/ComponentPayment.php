<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;

class ComponentPayment extends Component
{
   public $data, $name, $description, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false;

   public function render()
   {
      $this->data = Payment::all();
      return view('livewire.payment.component-payment');
   }

   public function delete($id)
   {
      $record = Payment::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selected_id) {
         $record = Payment::firstWhere('id', $this->selected_id);
         $record->delete();

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully Deleted!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'warning',
            'message'=> "Payment does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }
}
