<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;
use App\Models\User as Person;
use Illuminate\Support\Facades\Hash;

class ComponentUsers extends Component
{
   public $data, $name, $email, $password, $firstname, $lastname, $phone, $address, $selected_id;
   public $updateMode = false;
   public function render()
   {
      $this->data = Person::all();
      return view('livewire.users.component-users');
   }
   private function resetInput()
   {
      $this->name = null;
      $this->email = null;
   }

   public function store()
   {
      $this->validate([
         'first_name' => 'required|string|max:255',
         'last_name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|confirmed|min:8]',
      ]);
      $person = Person::create([
         'name' => $this->first_name . ' ' . $this->last_name,
         'email' => $this->email,
         'password' => Hash::make($this->password),
      ]);

      Profile::create([
         'user_id' => $person->id,
         'first_name' => $this->first_name,
         'last_name' => $this->last_name,
         'email' => $this->email,
         'phone' => $this->phone,
         'address' => $this->address,
      ]);
      
      $this->resetInput();
   }

   public function edit($id)
   {
      $record = Person::findOrFail($id);
      $this->selected_id = $id;
      $this->name = $record->name;
      $this->email = $record->email;
      $this->updateMode = true;
   }

   public function update()
   {
      $this->validate([
         'selected_id' => 'required|numeric',
         'name' => 'required|min:5',
         'email' => 'required|email:rfc,dns'
      ]);
      if ($this->selected_id) {
         $record = Person::find($this->selected_id);
         $record->update([
            'name' => $this->name,
            'email' => $this->email
         ]);
         $this->resetInput();
         $this->updateMode = false;
      }
   }

   public function destroy($id)
   {
      if ($id) {
         $record = Person::where('id', $id);
         $record->delete();
      }
   }
}
