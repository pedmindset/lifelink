<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\Fee;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;

class Fees extends Component
{
   public $feeData, $eventData, $selectedId, $selectedname;
   public $eventId, $standard_amount, $international_amount, $early_bird_amount, $late_amount, $late_date, $early_bird_date, $regular_date;
   public $createMode = false, $editMode = false, $deleteMode = false, $viewMode = false;
   public function render()
   {
      $this->eventData = Event::all();
      $this->feeData = Fee::latest()->get();
      return view('livewire.fees.fees');
   }

   private function resetInput()
   {
      $this->eventId = null;
      $this->standard_amount = null;
      $this->international_amount = null;
      $this->early_bird_amount = null;
      $this->late_amount = null;
      $this->regular_date = null;
      $this->early_bird_date = null;
      $this->late_date = null;

      $this->feeData = Fee::latest()->get();
   }

   public function store()
   {
      $this->validate([
         'eventId' => 'required|numeric',
         'standard_amount' => 'required|numeric',
         'international_amount' => 'nullable|numeric',
         'early_bird_amount' => 'nullable|numeric',
         'late_amount' => 'nullable|numeric',
         'regular_date' => 'required',
         'early_bird_date' => 'nullable',
         'late_date' => 'nullable',
      ]);
      $fee = Fee::create([
         'event_id' => $this->eventId,
         'fee_uuid' => Str::uuid(),
         'standard_amount' => $this->standard_amount,
         'international_amount' => $this->international_amount,
         'early_bird_amount' => $this->early_bird_amount,
         'late_amount' => $this->late_amount,
         'regular_date' => new DateTime($this->regular_date),
         'early_bird_date' => new DateTime($this->early_bird_date),
         'late_date' => new DateTime($this->late_date),
      ]);
      if ($fee) {
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

   public function edit($id)
   {
      // dd($id);
      $record = Fee::firstWhere('id',$id);
      $this->selectedname = $record->event->name;
      $this->standard_amount = $record->standard_amount;
      $this->international_amount = $record->international_amount;
      $this->early_bird_amount = $record->early_bird_amount;
      $this->late_amount = $record->late_amount;
      $this->regular_date = $record->regular_date;
      $this->early_bird_date = $record->early_bird_date;
      $this->late_date = $record->late_date;
      $this->selectedId = $id;

      $this->editMode = true;
   }

   public function update()
   {
      $this->validate([
         'standard_amount' => 'required|numeric',
         'international_amount' => 'required|numeric',
         'early_bird_amount' => 'required|numeric',
         'late_amount' => 'required|numeric',
         'regular_date' => 'required',
         'early_bird_date' => 'required',
         'late_date' => 'required',
      ]);

      if ($this->selectedId) {
         $record = Fee::firstWhere('id', $this->selectedId);
         $record->update([
            // 'event_id' => $this->selectedId,
            'standard_amount' => $this->standard_amount,
            'international_amount' => $this->international_amount,
            'early_bird_amount' => $this->early_bird_amount,
            'late_amount' => $this->late_amount,
            'regular_date' => new DateTime($this->regular_date),
            'early_bird_date' => new DateTime($this->early_bird_date),
            'late_date' => new DateTime($this->late_date),
         ]);

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=>  'Successfully updated!'
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'error',
            'message'=> "Fee does not Exit"
         ]);
      }

      $this->editMode = false;
      $this->resetInput();
   }

   public function delete($id)
   {
      $record = Fee::firstWhere('id', $id);
      $this->selectedId = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selectedId) {
         $record = Fee::firstWhere('id', $this->selectedId);
         $record->delete();

         $this->dispatchBrowserEvent('alertMessage',[
            'type' => 'info',
            'message' => "Successfully Deleted!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type' => 'error',
            'message' => "Fee does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }
}
