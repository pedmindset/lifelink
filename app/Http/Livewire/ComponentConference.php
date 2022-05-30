<?php

namespace App\Http\Livewire;

use DateTime;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ComponentConference extends Component
{
   use WithFileUploads;

   public $data, $viewItem, $name, $description, $venue, $event_image, $start_date, $end_date, $lat, $lng, $selected_id, $imgFile, $selectedname;
   public $updateMode = false, $saveMode= false, $isListing = false, $createMode = false, $deleteMode=false, $viewMode = false, $formCreateMode = false;

   // for route
   public $option, $optionId;

   // for detail page
   public $detailTab = false, $formTab = false, $officialTab = false, $awardTab = false, $addOfficialMode = false, $addAwardMode = false;

   public function render()
   {
      $this->data = Event::all();
      return view('livewire.conference.component-conference');
   }

   public function mount()
   {
      if (isset(request()->option)) {
         if (request()->option=='view') {
            $this->view(request()->id);
         }
         else{
            $this->isListing = true;
         }
      }
      else {
         $this->isListing = true;
      }
   }

   private function resetInput()
   {
      $this->name = null;
      $this->description = null;
      $this->start_date = null;
      $this->end_date = null;
      $this->lat = null;
      $this->lng = null;
      $this->event_image = null;
      $this->selectedname = null;
      $this->selected_id = null;
      $this->viewItem = null;

      $this->data = Event::all();
   }

   public function store()
   {
      $this->validate([
         'name' => 'required|string|max:255',
         'start_date' => 'required',
         'end_date' => 'required',
         'venue' => 'required|string|max:255',
         'lat' => 'nullable',
         'lng' => 'nullable',
         'event_image' => 'file|mimes:png,jpg,jpeg|max:2048'
      ]);
      $event = Event::create([
         'name' => $this->name,
         'description' => $this->description,
         'venue' => $this->venue,
         'latitude' => $this->lat,
         'longitude' => $this->lng,
         'start_date' => new DateTime($this->start_date),
         'end_date' => new DateTime($this->end_date),
         // 'uuid' => Str::uuid(),
      ]);

      if($this->event_image){
        $event->addMedia($this->event_image->getRealPath())->toMediaCollection('event_image');

      }

      $this->dispatchBrowserEvent('alertMessage',[
         'type'=>'info',
         'message'=> "Successfully created!"
      ]);


      $this->createMode = false;
      $this->resetInput();
   }

   public function gotoListing()
   {
      $this->viewMode = false;
      $this->selected_id = null;
   }

   private function view($id)
   {
      $this->selected_id = $id;
      $record = Event::findOrFail($id);
      $this->viewItem = $record;

      $this->switchtab(1);
      $this->viewMode = true;

      // dd($this->isListing);
   }

   public function edit($id)
   {
      $record = Event::findOrFail($id);
      $this->selected_id = $id;
      $this->selectedname =  $record->name;
      $this->name = $record->name;
      $this->description = $record->description;
      $this->start_date = $record->start_date;
      $this->end_date = $record->end_date;
      $this->venue = $record->venue;
      $this->lat = $record->latitude;
      $this->lng = $record->longitude;
      $this->imgFile = $record->thumb_image_url;

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
            'start_date' => new DateTime($this->start_date),
            'end_date' => new DateTime($this->end_date),
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
        //  $record->forms->delete();
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

   public function showForm()
   {
      return redirect()->route('event.form', ['id' => 1]);
   }
}
