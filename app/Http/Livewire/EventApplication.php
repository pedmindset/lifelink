<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use App\Models\EventApplications;

class EventApplication extends Component
{
   public $data,$eventId, $name, $description, $schema, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false, $viewMode = false;

   public function render()
   {
      $this->data = EventApplications::all();
      $this->events = Event::all();
      $this->schema = [];
      return view('livewire.event_application.event-application');
   }

   public function delete($id)
   {
      $record = EventApplications::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   private function resetInput()
   {
      $this->name = null;
      $this->description = null;
      $this->start_date = null;
      $this->end_date = null;
      $this->selectedname = null;
      $this->selected_id = null;

      $this->data = EventApplications::all();
   }

   public function store()
   {
      $this->validate([
         'name' => 'required|string|max:255',
         'start_date' => 'required',
         'end_date' => 'required',
      ]);
      $event = EventApplications::create([
         'name' => $this->name,
         'description' => $this->description,
         'schema' => $this->schema,
      ]);
      
      $this->dispatchBrowserEvent('alertMessage',[
         'type'=>'info',
         'message'=> "Successfully created!"
      ]);

      $this->createMode = false;
      $this->resetInput();
   }
   
   public function edit($id)
   {
      $record = EventApplications::findOrFail($id);
      $this->selected_id = $id;
      $this->selectedname =  $record->name;
      $this->name = $record->name;
      $this->description = $record->description;
      // $this->schema = $record->schema;

      $this->updateMode = true;
   }

   public function update()
   {
      $this->validate([
         'selected_id' => 'required|numeric',
         'name' => 'required|string|max:255',
      ]);

      if ($this->selected_id) {
         $record = EventApplications::firstWhere('id', $this->selected_id);
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
