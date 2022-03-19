<?php

namespace App\Http\Livewire\Pages;

use App\Events\ApplyEmailEvent;
use Livewire\Component;
use App\Models\Applicant;
use App\Models\EventApplications;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Casts\ArrayObject;

class FormApplication extends Component
{
   public $formId,$eventId,$userId, $data, $valueIn; 
   public $schema;
   public $applicantData = [];
   public $isMobile = false, $formFinish = false;
   public function render()
   {
      $data = EventApplications::firstWhere('id', $this->formId);
      $this->data = $data;
      $this->eventId = $data->event->id;
      $this->schema = json_decode($this->data->schema);
      return view('livewire.pages.form-application');
   }
   
   public function mount($id, $userId, $isMobile)
   {
      $this->formId = $id;
      $this->userId = $userId;
      $this->isMobile = $isMobile;
      // dd($this->schema[0]);
   }
   
   public function getFieldValue($value, $fieldName)
   {
      $this->applicantData = array_replace($this->applicantData, [$fieldName => $value]);
   }
   
   public function saveForm()
   {
      $application = EventApplications::firstWhere('id', $this->formId);
      if($this->isMobile){
         $user = User::findOrFail($this->userId);
      }
      else {
         $user = auth()->user();
      }

      if ($application->applicants->contains($user)) {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'alert',
            'message'=>  'Already Registered!'
         ]);
         // $this->applyMode = false;
      }
      else {
         $counterStart = $application->applicants()->count();
         $application->applicants()->attach($user->id, ['form_data'=> json_encode($this->applicantData)]);
         $counterEnd = $application->applicants()->count();
         if($counterEnd > $counterStart)
         {
            // send email to user email about the event
            event(new ApplyEmailEvent($application, $user));
            $this->dispatchBrowserEvent('alertMessage',[
               'type'=>'success',
               'message'=>  'Successfully applied!'
            ]);
            // $this->applyMode = false;
         }else {
            $this->dispatchBrowserEvent('alertMessage',[
               'type'=>'error',
               'message'=>  'Application unsuccessful!'
            ]);
         }
      }

      
   }
}
