<?php

namespace App\Http\Livewire\EventApplication;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\EventApplications;
use Illuminate\Support\Collection;

class CreateForm extends Component
{
   public $eventId, $name, $description, $fieldSelected_id = null, $schemaFieldsCount = 0;
   public $optionMode = false, $createForm = false;
   public $field_save_action = 'Add Field';
   // schema data
   public Collection $schema;
   public ?EventApplications $event_application = null;

   public $openCreateForm = false, $rules, $requiredRule, $fieldName, $fieldType, $placeholder, $fieldOptions, $fieldId;

   public function render()
   {
      return view('livewire.event-application.create-form');
   }

   protected $listeners = ['editForm', 'openForm', 'deleteForm'];

   public function openForm()
   {
     $this->openCreateForm = true;
    //  dump($this->schema);
   }

   public function closeForm()
   {
     $this->openCreateForm = false;
   }

   public function deleteForm($event_application_id)
   {
        $this->emit('setDisplayLoading', true);

        $this->event_application = EventApplications::firstWhere('id', $event_application_id);

        $this->event_application->delete();

        $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'info',
            'message'=> "Successfully deleted!"
        ]);

        $this->emit('setDisplayLoading', false);

        $this->cancel();
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
        $this->resetInput();
        $this->resetFieldInput();
        $this->schema = collect([]);
   }

   public function removeField($id)
   {
        $this->schema = $this->schema->whereNotIn('id', [$id]);
   }

   public function selectField($id)
   {
        $field = $this->schema->firstWhere ('id', $id);

        $this->fieldSelected_id = $field['id'];
        $this->fieldType = $field['fieldType'];
        $this->fieldName = $field['fieldName'];
        $this->model = $field['model'];
        $this->placeholder = $field['placeholder'];
        $this->rules = $field['rules'];
        $this->fieldOptions = $field['options'];

        $this->switchOption($this->fieldType);
        $this->field_save_action = 'Edit Field';

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

        if($value == 2)
        {
            $this->optionMode = true;
        }
        elseif ( $value == 3)
        {
            $this->optionMode = true;
        }
        elseif ( $value == 4)
        {
            $this->optionMode = true;
        }
        else
        {
            $this->optionMode = false;
        }
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

      if(!is_array(($this->fieldOptions)))
      {
        $options = explode(",",$this->fieldOptions);
      }
      else
      {
        $options = $this->fieldOptions;

      }
      $data = [
         'id' => $this->fieldSelected_id ?? $this->schemaFieldsCount + 1,
         'fieldType' => $this->fieldType,
         'fieldName' => $this->fieldName,
         'model'=> str_replace(" ", "_", strtolower( $this->fieldName )),
         'placeholder' => $this->placeholder,
         'rules' => $this->rules,
         'options' => $options,
      ];


      if($this->fieldSelected_id == null){
         $this->schema = $this->schema->push($data);
        //  $this->schema->all();
         $this->schemaFieldsCount =  $this->schemaFieldsCount + 1;
      }
      else {
        //  $this->schema = $this->schema->whereNotIn('id', [$data['id']]);

         $this->schema = $this->schema->map(function ($item, $key) use ($data) {

            if($data['id'] == $item['id'])
            {
                return [
                    'id' => $data['id'],
                    'fieldType' => $data['fieldType'],
                    'fieldName' =>  $data['fieldName'],
                    'model'=>  $data['model'],
                    'placeholder' =>  $data['placeholder'],
                    'rules' =>  $data['rules'],
                    'options' => $data['options'],
                 ];
            }
            else
            {
                return [
                    'id' => $item['id'],
                    'fieldType' =>$item['fieldType'],
                    'fieldName' =>$item['fieldName'],
                    'model'=> $item['model'],
                    'placeholder' => $item['placeholder'],
                    'rules' => $item['rules'],
                    'options' =>$item['options'],
                 ];
            }

         });

        //  $this->schema = $this->schema->push($data);
        //  $this->schema->all();
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
      $this->field_save_action = 'Add Field';
      $this->rules = null;
      $this->fieldName = null;
      $this->fieldType = null;
      $this->placeholder = null;
      $this->fieldOptions = null;
      $this->fieldSelected_id = null;
   }
}
