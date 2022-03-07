<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   use ResponseTrait;

   public function loginAction(Request $request)
   {
      $request->validate([
         'email' => 'required|email',
         'password' => 'required',
         'device_name' => 'required',
      ]);

      $user = User::firstWhere('email', $request->email);
      if (! $user || ! Hash::check($request->password, $user->password)) {
         return $this->fail(null, 'The provided credentials are incorrect.');
      }

      $responseUser = array(
         'name' => $user->name,
         'authKey' => $user->createToken($request->device_name)->plainTextToken,
         'profile' => $user->profile
      );

      return $this->success($responseUser, 'Login successful');
   }

   public function registerAction(Request $request)
   {
      $uu = User::firstWhere('email', $request->email);
      if ($uu) {
         return $this->fail('Failed', 'Account already exist!');
      }

      $user = User::create([
         'name' => $request->first_name . ' ' . $request->last_name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
      ]);

      Profile::create([
         'user_id' => $user->id,
         'first_name' => $request->first_name,
         'last_name' => $request->last_name,
         'email' => $request->email,
         'phone' => $request->phone,
         'address' => $request->address,
      ]);

      return $this->success('Successful', 'Account successfully created');
   }

   // reset password
   public function reset_password(Request $request)
   {
      $user = request()->user();
      if(!Hash::check($request->old_password, $user->password)){
         return $this->fail('User Not Found', 'The provided credentials are incorrect.');
      }
      
      $user->password = Hash::make($request->new_password);
      $user->currentAccessToken()->delete();
      $user->save();
      return $this->success('Reset Successful', 'Password reset successful.\nPlease relogin.');
   }

   // logout
   public function logoutAction()
   {
      $user = request()->user();
      $user->currentAccessToken()->delete();
      return $this->success('Logout Successful', 'You have successfully logged out.');
   }
}
