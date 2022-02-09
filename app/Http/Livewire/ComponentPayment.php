<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Str;

class ComponentPayment extends Component
{
   public $payData, $users, $name, $selected_id, $selectedname;
   public $event_id, $user_id, $description, $payment_for_event, $payment_for_aluminia, $payment_for, $amount;
   public $createMode = false, $editMode = false, $deleteMode = false, $viewMode = false;

   public function render()
   {
      $this->payData = Payment::all();
      $this->users = User::role('customer')->get();
      return view('livewire.payment.component-payment');
   }

   private function resetInput()
   {
      $this->event_id = null;
      $this->user_id = null;
      $this->amount = null;
      $this->selected_id = null;
      $this->selectedname = null;
      $this->payment_for = null;
      $this->description = null;

      $this->payData = Payment::latest()->get();
   }

   public function getPaymentFor($type) {
      if ($type == 0) {
         $this->payment_for = 'Event';
         $this->payment_for_aluminia = false;
      }
      else {
         $this->payment_for = 'Aluminia';
         $this->payment_for_event = false;
      }
   }

   public function store()
   {
      $this->validate([
         'user_id' => 'required|integer',
         'amount' => 'required|numeric',
      ]);
      $pay = Payment::create([
         'event_id' => $this->event_id,
         'user_id' => $this->user_id,
         'uuid' => Str::uuid(),
         'description' => $this->description,
         'amount' => $this->amount,
         'isAluminia' => $this->payment_for == 'Event' ? false : true,
      ]);
      if ($pay) {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully created!"
         ]);
         $this->createMode = false;
         $this->resetInput();
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'error',
            'message'=> "Error when saving Fee"
         ]);
      }
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
