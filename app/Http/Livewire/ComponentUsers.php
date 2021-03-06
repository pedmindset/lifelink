<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;
use App\Models\User as Person;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithFileUploads;

class ComponentUsers extends Component
{
    use WithFileUploads;

   public $data, $roles, $name, $email, $password, $password_confirmation, $firstname, $lastname, $phone, $address, $rolename, $selected_id, $selectedname, $image;
   public $updateMode = false, $createMode = false, $deleteMode=false;
   public function render()
   {
      $this->roles = Role::all();
      return view('livewire.users.component-users');
   }

   public function mount()
   {
      $this->data = Person::latest()->get();
   }

   public function sortedBy($value){
      if ($value == 'client') {
         $this->data = Person::role('customer')->get();
      }
      elseif ($value == 'staff') {
         $this->data = Person::whereNotIn('name', ['customer'])->get();
      }
      else {
         $this->data = Person::latest()->get();
      }
   }

   private function resetInput()
   {
      $this->name = null;
      $this->firstname = null;
      $this->lastname = null;
      $this->email = null;
      $this->password = null;
      $this->password_confirmation = null;
      $this->rolename = null;
      $this->selectedname = null;
      $this->selected_id = null;
      $this->phone = null;
      $this->address = null;
      $this->image = null;


      $this->data = Person::latest()->get();
      // $this->data = Person::role('customer')->get();
   }

   public function store()
   {
      $this->validate([
         'firstname' => 'required|string|max:255',
         'lastname' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|confirmed|min:8',
         'rolename' => 'required|string',
      ]);
      $person = Person::create([
         'name' => $this->firstname . ' ' . $this->lastname,
         'email' => $this->email,
         'password' => Hash::make($this->password),
      ]);

      Profile::create([
         'user_id' => $person->id,
         'first_name' => $this->firstname,
         'last_name' => $this->lastname,
         'email' => $this->email,
         'phone' => $this->phone,
         'address' => $this->address,
      ]);
      $person->assignRole($this->rolename);

      $this->dispatchBrowserEvent('createdAlert',[
         'type'=>'info',
         'message'=> $this->firstname." successfully created!"
      ]);
      $this->createMode = false;
      $this->resetInput();
   }

   public function edit($id)
   {
      $record = Person::findOrFail($id);
      $this->selected_id = $id;
      $this->selectedname = $record->name;
      $this->firstname = $record->profile->first_name;
      $this->lastname = $record->profile->last_name;
      $this->email = $record->email;
      $this->phone = $record->profile->phone;
      $this->address = $record->profile->address;
      $this->rolename = $record->getRoleNames()[0];

      $this->updateMode = true;
   }

   public function update()
   {
      $this->validate([
         'selected_id' => 'required|numeric',
         'firstname' => 'required|string|max:255',
         'lastname' => 'required|string|max:255',
         'email' => 'required|string|email|max:255',
         'rolename' => 'required|string',
      ]);

      if ($this->selected_id) {
         $record = Person::firstWhere('id', $this->selected_id);
         $profile = $record->profile;
         $profile->update([
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
         ]);


         $record->removeRole($record->getRoleNames()[0]);
         $record->assignRole($this->rolename);

         $record->update([
            'name' => $this->firstname . ' ' . $this->lastname,
            'email' => $this->email
         ]);

         $this->dispatchBrowserEvent('createdAlert',[
            'type'=>'info',
            'message'=> $this->firstname." successfully updated!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('createdAlert',[
            'type'=>'warning',
            'message'=> "User does not Exit"
         ]);
      }

      $this->updateMode = false;
      $this->resetInput();
   }

   public function delete($id)
   {
      // $record = Person::firstWhere('id', $id);
      $this->selected_id = $id;

      $this->deleteMode = true;
   }

   public function destroy()
   {
      if ($this->selected_id) {
         $record = Person::firstWhere('id', $this->selected_id);
         $record->profile()->delete();
         $record->removeRole($record->getRoleNames()[0]);

         $this->selectedname = $record->name;
         $record->delete();

         $this->dispatchBrowserEvent('createdAlert',[
            'type'=>'info',
            'message'=> $this->selectedname." successfully deactivated!"
         ]);
      }
      else {
         $this->dispatchBrowserEvent('createdAlert',[
            'type'=>'warning',
            'message'=> "User does not Exit"
         ]);
      }

      $this->deleteMode = false;
      $this->resetInput();
   }
}
