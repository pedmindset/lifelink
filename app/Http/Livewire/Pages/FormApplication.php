<?php

namespace App\Http\Livewire\Pages;

use App\Events\ApplyEmailEvent;
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
      $data = EventApplications::firstWhere('id', $this->formId);
      $this->data = $data;
      $this->eventId = $data->event->id;
      $this->schema = json_decode($this->data->schema);
      return view('livewire.pages.form-application');
   }
   
   public function mount($id)
   {
      $this->formId = $id;
      // dd($this->schema[0]);
   }
   
   public function getFieldValue($value, $fieldName)
   {
      $this->applicantData = array_replace($this->applicantData, [$fieldName => $value]);
   }
   
   public function saveForm()
   {
      // dd($this->applicantData);
      $application = EventApplications::firstWhere('id', $this->formId);
      if ($application->applicants->contains(auth()->user())) {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'alert',
            'message'=>  'Already Registered!'
         ]);
      }
      else {
         $attach = $application->applicants()->attach(auth()->user()->id, ['form_data'=> json_encode($this->applicantData)]);
         if($attach){
            // send email to user email about the event
            event(new ApplyEmailEvent($application, auth()->user()));
            $this->dispatchBrowserEvent('alertMessage',[
               'type'=>'success',
               'message'=>  'Successfully applied!'
            ]);
         }else {
            $this->dispatchBrowserEvent('alertMessage',[
               'type'=>'error',
               'message'=>  'Application unsuccessful!'
            ]);
         }
      }
      
   }
}
