<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Profile;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SettingPage extends Component
{
   use WithFileUploads;
   
   // user profile
   public $firstName, $lastName, $address, $phone, $photoImage, $profileImage;
   // password
   public $oldPassword, $newPassword;
   // billing
   public $settings, $aluminiaDue;

   public function render()
   {
      return view('livewire.setting-page');
   }

   public function mount()
   {
      $this->settings = Setting::first();
      if($this->settings){
         $this->aluminiaDue = $this->settings->aluminiaDue;
      }
      $user = auth()->user();
      $this->firstName = $user->profile->first_name;
      $this->lastName = $user->profile->last_name;
      $this->address = $user->profile->address;
      $this->phone = $user->profile->phone;
      $this->profileImage = $user->thumb_image_url;

      // dd($this->profileImage);
   }

   public function storeProfile()
   {
      $user = User::firstWhere('id', auth()->user()->id);
      $profile = Profile::firstWhere('user_id', $user->id);

      //save user name
      $user->name = $this->firstName . ' ' . $this->lastName;
      $user->save();

      // save profile
      $profile->address = $this->address;
      $profile->first_name = $this->firstName;
      $profile->last_name = $this->lastName;
      $profile->phone = $this->phone;
      $profile->save();

      if ($this->photoImage != null) {
         $user->addMedia($this->photoImage->getRealPath())->toMediaCollection('profile_image');
      }

      $this->dispatchBrowserEvent('alertMessage',[
         'type'=>'info',
         'message'=> "Profile updated!"
      ]);
   }

   public function storePassword()
   {
      $user = User::firstWhere('id', auth()->user()->id);
      if (! Hash::check($this->oldPassword, $user->password)) {
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'error',
            'message'=> "Incorrect old password!"
         ]);
      //    throw ValidationException::withMessages([
      //       'oldPassword' => 'Incorrect password',
      //   ]);
         return;
      }
      //save user name
      $user->password = Hash::make($this->newPassword);
      $user->save();

      $this->dispatchBrowserEvent('alertMessage',[
         'type'=>'info',
         'message'=> "Password updated!"
      ]);

      $this->oldPassword = null;
      $this->newPassword = null;
   }

   public function saveBilling()
   {
      if($this->settings){
         $setting = Setting::firstWhere('id', $this->settings->id);
         $setting->aluminiaDue = $this->aluminiaDue;
         $setting->save();

         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'success',
            'message'=> "Dues updated!"
         ]);
      }else {
         Setting::create([
            'aluminiaDue' => $this->aluminiaDue
         ]);
         $this->dispatchBrowserEvent('alertMessage',[
            'type'=>'success',
            'message'=> "Dues created!"
         ]);
      }
   }
}
