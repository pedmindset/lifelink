<?php

namespace App\Http\Livewire;

use App\Models\EventApplications;
use Livewire\Component;

class EventApplicants extends Component
{
   public $formId, $data;

   public function render()
   {
      return view('livewire.event-applicants');
   }

   public function mount()
   {
      $this->formId = request()->id;
      $this->data = EventApplications::Where('id', $this->formId)->with(['applicants' => function($query){
          $query->latest();
      }])->first()->applicants;
      // dd($this->data);
   }
}
