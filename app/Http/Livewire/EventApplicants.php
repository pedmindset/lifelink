<?php

namespace App\Http\Livewire;

use App\Models\EventApplications;
use Livewire\Component;

class EventApplicants extends Component
{
   public $formId, $data = [];

   public function render()
   {
      return view('livewire.event-applicants');
   }

   public function mount()
   {
      $this->formId = request()->id;
      $applicants = EventApplications::Where('id', $this->formId)->with(['applicants' => function($query){
          $query->latest();
      }])->first();

      if($applicants)
      {
        $this->data = $applicants->applicants;
      }




      // dd($this->data);
   }
}
