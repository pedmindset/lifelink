<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;

class ComponentConference extends Component
{
   public $data, $name, $description, $start_date, $end_date, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false;

   public function render()
   {
      $this->data = Event::all();
      return view('livewire.conference.component-conference');
   }

   private function resetInput()
   {
      $this->name = null;
      $this->description = null;
      $this->start_date = null;
      $this->end_date = null;
      $this->selectedname = null;
      $this->selected_id = null;

      $this->data = Event::all();
   }

   public function store()
   {
      $this->validate([
         'name' => 'required|string|max:255',
         'start_date' => 'required',
         'end_date' => 'required',
      ]);
      $event = Event::create([
         'name' => $this->name,
         'description' => $this->description,
         'start_date' => new DateTime($this->start_date),
         'end_date' => new DateTime($this->end_date),
         // 'uuid' => Str::uuid(),
      ]);
      
      $this->dispatchBrowserEvent('alertMessage',[
         'type'=>'info',
         'message'=> "Successfully created!"
      ]);

      // $event->addMedia($this->Event_image->getRealPath())->toMediaCollection('Event_image');

      $this->createMode = false;
      $this->resetInput();
   }
   
   public function edit($id)
   {
      $record = Event::findOrFail($id);
      $this->selected_id = $id;
      $this->selectedname =  $record->name;
      $this->name = $record->name;
      $this->description = $record->description;

      $this->updateMode = true;
   }

   public function update()
   {
      $this->validate([
         'selected_id' => 'required|numeric',
         'name' => 'required|string|max:255',
      ]);

      if ($this->selected_id) {
         $record = Event::firstWhere('id', $this->selected_id);
         $record->update([
            'name' => $this->name,
            'description' => $this->description,
         ]);

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=>  'Successfully updated!'
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'warning',
            'message'=> "Event / Citation does not Exit"
         ]);
      }

      $this->updateMode = false;
      $this->resetInput();
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
