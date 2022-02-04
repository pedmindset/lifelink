<?php

namespace App\Http\Livewire\Pages;

use App\Models\Applicant;
use Livewire\Component;
use App\Models\EventApplications;

class FormApplication extends Component
{
   public $formId,$eventId, $data, $schema, $valueIn; 
   public $applicantData = [];
   public function render()
   {
      return view('livewire.pages.form-application');
   }

   protected $rules = [
      'schema.*.model' => 'required',
   ];

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
      $this->schema = json_decode($this->data->schema);
   }

   public function saveForm()
   {
      // $this->validate();
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
