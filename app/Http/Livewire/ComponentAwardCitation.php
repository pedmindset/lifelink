<?php

namespace App\Http\Livewire;

use App\Models\Award;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ComponentAwardCitation extends Component
{
   use WithFileUploads;
   
   public $data, $name, $description, $selected_id, $selectedname, $selectedClient, $selectedClientName;
   public $clients = [], $awardedList = [];
   public $updateMode = false, $createMode = false, $deleteMode=false, $tagMode=false, $listingMode = false;
   public function render()
   {
      $this->data = Award::all();
      return view('livewire.awards.component-award-citation');
   }

   private function resetInput()
   {
      $this->name = null;
      $this->description = null;
      $this->selectedname = null;
      $this->selected_id = null;
      $this->selected_id = null;
      $this->selectedClientName = null;
      $this->selectedClient = null;

      $this->data = Award::all();
   }

   public function store()
   {
      $this->validate([
         'name' => 'required|string|max:255',
      ]);
      $award = Award::create([
         'name' => $this->name,
         'description' => $this->description,
         'uuid' => Str::uuid(),
      ]);
      
      $this->dispatchBrowserEvent('alertMessage',[
         'type'=>'info',
         'message'=> "Successfully created!"
      ]);

      // $award->addMedia($this->award_image->getRealPath())->toMediaCollection('award_image');

      $this->createMode = false;
      $this->resetInput();
   }
   
   public function edit($id)
   {
      $record = Award::findOrFail($id);
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
         $record = Award::firstWhere('id', $this->selected_id);
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
            'message'=> "Award / Citation does not Exit"
         ]);
      }

      $this->updateMode = false;
      $this->resetInput();
   }

   public function delete($id)
   {
      $record = Award::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->name;
      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selected_id) {
         $record = Award::firstWhere('id', $this->selected_id);
         $record->delete();

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully Deleted!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'warning',
            'message'=> "Award / Citation does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }

   public function tagAwardCitation($id) {
      $record = Award::findOrFail($id);
      $this->clients = User::role('customer')->get();
      $this->selected_id = $id;
      $this->selectedname =  $record->name;

      $this->tagMode = true;
   }

   public function selectUser($client){
      $this->selectedClientName = $client['name'];
      $this->selectedClient = $client['id'];
      // dd($this->selectedClient);
   }

   public function allocate()
   {
      $record = Award::findOrFail($this->selected_id);
      if($record->user()->sync($this->selectedClient)){
         $this->tagMode = false;
         $this->resetInput();
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'success',
            'message'=> "Successfully Assign!"
         ]);
      } else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'error',
            'message'=> "Could not assign Award!"
         ]);
      }
   }

   public function showListing($id)
   {
      $record = Award::findOrFail($id);
      $this->selected_id = $id;
      $this->selectedname =  $record->name;
      $this->awardedList = $record->user;
      $this->listingMode = true;
   }

   // public function searchClient($data) {
   //    if(strlen(trim($data)) > 2){
   //       $this->clients = $this->clients->
   //    }
   // }
}
