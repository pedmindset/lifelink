<?php

namespace App\Http\Livewire\Pages;

use App\Models\Applicant;
use Livewire\Component;

class FormView extends Component
{
   public $applicantData = [];
   public $formId,$eventId;
   public function render()
   {
      return view('livewire.pages.form-view');
   }
}
