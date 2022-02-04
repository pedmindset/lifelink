<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $user = User::create([
         'name' => 'Kwadwo Mensah Osei',
         'email' => 'kwadwo@gmail.com',
         'password' => Hash::make('password12'), // password
         'email_verified_at' => now(),
         'remember_token' => Str::random(10),
      ]);
      $user->addMediaFromUrl('http://127.0.0.1:8000/img/image_profile.png')->toMediaCollection('profile_image');
      Profile::create([
         'user_id' => 1,
         'first_name' => 'Kwadwo Mensah',
         'last_name' => 'Osei',
         'email' => 'kwadwo@gmail.com',
         'phone' => '0554255825',
         'address' => 'Banana Street 19',
         'aluminia' => 0,
         'fb_token' => null,
      ]);

      $user->assignRole('super_admin');

   }
}
