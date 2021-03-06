<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Announcement;
use App\Models\Tag;

class ComponentAnnouncement extends Component
{
   public $data, $tags, $selectedTags = [], $selectedTag; 
   public $subject, $content, $selected_id, $selectedname;
   public $updateMode = false, $createMode = false, $deleteMode=false;

   public function render()
   {
      $this->data = Announcement::latest()->get();
      $this->tags = Tag::latest()->get();
      return view('livewire.announcement.component-announcement');
   }

   private function resetInput()
   {
      $this->subject = null;
      $this->content = null;
      $this->selectedname = null;
      $this->selected_id = null;
      $this->selectedTag = null;

      $this->data = Announcement::latest()->get();
   }

   public function notify($id) {
      
   }

   public function store()
   {
      // dd($this->selectedTags);
      $this->validate([
         'selectedTag' => 'required',
         'subject' => 'required|string|max:255',
         'content' => 'required|string',
      ]);
      $ann = Announcement::create([
         'subject' => $this->subject,
         'content' => $this->content,
         'uuid' => Str::uuid(),
      ]);

      $ann->tags()->attach($this->selectedTag);

      if($ann){
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully created!"
         ]);
         
         $this->createMode = false;
         $this->resetInput();
      } else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'error',
            'message'=> "Error, could not add announcement"
         ]);
      }
      
   }
   
   public function edit($id)
   {
      $record = Announcement::findOrFail($id);
      $this->selected_id = $id;
      $this->selectedname =  $record->subject;
      $this->subject = $record->subject;
      $this->content = $record->content;

      $this->updateMode = true;
   }



   public function update()
   {
      $this->validate([
         'selected_id' => 'required|numeric',
         'subject' => 'required|string|max:255',
         'content' => 'required|string',
      ]);

      if ($this->selected_id) {
         $record = Announcement::firstWhere('id', $this->selected_id);
         $record->update([
            'subject' => $this->subject,
            'content' => $this->content,
         ]);

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=>  'Successfully updated!'
         ]);
      }
      else {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'error',
            'message'=> "Announcement update error."
         ]);
      }

      $this->updateMode = false;
      $this->resetInput();
   }

   public function delete($id)
   {
      $record = Announcement::firstWhere('id', $id);
      $this->selected_id = $record->id;
      $this->selectedname = $record->subject;
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
            'type'=>'error',
            'message'=> "Announcement not deleted. Try again later"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }

}
