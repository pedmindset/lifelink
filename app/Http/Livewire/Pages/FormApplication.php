<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Applicant;
use App\Models\EventApplications;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Casts\ArrayObject;

class FormApplication extends Component
{
   public $formId,$eventId, $data, $valueIn; 
   public $schema;
   public $applicantData = [];
   public function render()
   {
      return view('livewire.pages.form-application');
   }

   public function getFieldValue($value, $fieldName)
   {
      $this->applicantData = array_replace($this->applicantData, [$fieldName => $value]);
   }
   
   public function mount($id)
   {
      $this->formId = $id;
      $data = EventApplications::firstWhere('id', $this->formId);
      $this->data = $data;
      $this->eventId = $data->event->id;
      $this->schema = $this->data->schema;
   }

   public function saveForm()
   {
      $saved = Applicant::create([
         'event_id' => $this->eventId,
         'event_application_id' => $this->formId,
         'user_id' => auth()->user()->id,
         'form_data' => json_encode($this->applicantData)
      ]);
      $this->dispatchBrowserEvent('alertMessage',[
         'type'=>'info',
         'message'=>  'Successfully applied!'
      ]);
   }
}
