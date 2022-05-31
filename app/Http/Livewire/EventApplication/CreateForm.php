<?php

namespace App\Http\Livewire\EventApplication;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\EventApplications;
use Illuminate\Support\Collection;

class CreateForm extends Component
{
   public $eventId, $name, $description, $fieldSelected_id, $schemaFieldsCount = 0;
   public $optionMode=false, $createForm = false;
   // schema data
   public Collection $schema;
   public EventApplications $event_application;

   public $openCreateForm = false, $rules, $requiredRule, $fieldName, $fieldType, $placeholder, $fieldOptions, $fieldId;

   public function render()
   {
      return view('livewire.event-application.create-form');
   }

   protected $listeners = ['editForm', 'openForm'];

   public function openForm()
   {
     $this->openCreateForm = true;
   }

   public function closeForm()
   {
     $this->openCreateForm = false;
   }


   public function editForm($event_application_id)
   {
        $this->event_application = EventApplications::firstWhere('id', $event_application_id);
        $data = (json_decode($this->event_application->schema, true));

        $this->eventId = $this->event_application->event_id;
        $this->name = $this->event_application->name;
        $this->description = $this->event_application->description;

        foreach ($data as $d) {
            // dump($d);
            // dump($d['fieldName']);
            $this->schema =  $this->schema->push($d);
        }

        $this->schemaFieldsCount =  $this->schema->count();
        $this->openForm();

   }

   public function cancel()
   {
        $this->openCreateForm = false;
        $this->schemaFieldsCount = 0;
        $this->schema = collect([]);
   }

   public function mount($eventId, $schema = null)
   {
      $this->eventId = $eventId;
      $this->createForm = true;
      $this->schema = collect();
   }

   public function store()
   {
      $this->validate([
         'name' => 'required',
      ]);
      if($this->event_application){
            $this->event_application->name = $this->name;
            $this->event_application->schema = json_encode($this->schema);
            $this->event_application->save();

            $this->dispatchBrowserEvent('alertMessage',[
                'type'=>'info',
                'message'=> "Successfully updated!"
            ]);

      }
      else
      {
            EventApplications::create([
                'event_id' => $this->eventId,
                'name' => $this->name,
                'description' => $this->description,
                'schema' => json_encode($this->schema)
            ]);

            $this->dispatchBrowserEvent('alertMessage',[
                'type'=>'info',
                'message'=> "Successfully created!"
            ]);
        }

        $this->openCreateForm = false;
        $this->resetInput();
   }

   public function switchOption($value){
      $value > 2 ? $this->optionMode = true : $this->optionMode = false;
   }

   public function getValue($index, $value){
      $val = $this->rules[$index]['value'];
      $val = $this->rules[$index]['value'];
      if ($val) {
         $this->rules[$index]['value'] = false;
      }
      else {
         $this->rules[$index]['value'] = false;
      }
      // dd($this->rules);
   }

   public function addOption($value) {

   }

   public function addField() {
      $this->validate([
         'fieldName' => 'required',
         'fieldType' => 'required',
      ]);

      $options = explode(",",$this->fieldOptions);
      $data = [
         'id' => $this->fieldSelected_id ?? $this->schemaFieldsCount,
         'fieldType' => $this->fieldType,
         'fieldName' => $this->fieldName,
         'model'=> str_replace(" ", "_", strtolower( $this->fieldName )),
         'placeholder' => $this->placeholder,
         'rules' => $this->rules,
         'options' => $options,
      ];


      if($this->fieldSelected_id == null){
         $this->schema = $this->schema->push($data);
         $this->schema->all();
         $this->schemaFieldsCount =  $this->schemaFieldsCount + 1;
      }
      else {
         $this->schema = $this->schema->whereNotIn('id', $data['id']);
         $this->schema = $this->schema->push($data);
         $this->schema->all();
      }
      $this->resetFieldInput();

   }

   private function resetInput()
   {
      $this->name = null;
      $this->description = null;
      $this->schema = collect([]);
      $this->schemaFieldsCount = 1;
      $this->fieldSelected_id = null;
   }

   private function resetFieldInput()
   {
      $this->rules = null;
      $this->fieldName = null;
      $this->fieldType = null;
      $this->placeholder = null;
      $this->fieldOptions = null;
      $this->fieldSelected_id = null;
   }
}
