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

    public function updateToken(Request $request)
    {
      $user = request()->user();
      $profile = Profile::firstWhere('user_id', $user->id);
      $profile->token = $request->token;
      $profile->save();

      return $this->success('Token Updated', 'Success.');
    }

    public function updateImage(Request $request)
    {
      $user = request()->user();
      $profile = Profile::firstWhere('user_id', $user->id);
      if($profile->addMedia($request['profile_image'])->toMediaCollection('profile_image')){
        $profile->refresh();
        return $profile;
        return $this->success('Profile image updated', 'Success.');
      }
      return $this->fail('Profile image update error');
    }

    public function loginAction(Request $request)
    {
      $user = null;
      if (empty($request->device_name)) {
          return $this->fail('Device Error: Unknown Device');
      }
      if (empty($request->email) && empty($request->phone)) {
          return $this->fail('Email or Phone number required');
      }
      if (isset($request->email) && empty($request->password)) {
          return $this->fail('Password required');
      }

      if (isset($request->phone) && empty($request->email))
          $user = User::where('phone', $request->phone)->first();
      else
          $user = User::where('email', $request->email)->first();

      if (! $user || ! Hash::check($request->password, $user->password)) {
          return $this->fail('The provided credentials are incorrect.');
      }

      if ($user->currentAccessToken() != null) {
          $user->currentAccessToken()->delete();
      }

      $responseUser = array(
          'name' => $user->name,
          'first_name' => $user->profile->first_name,
          'last_name' => $user->profile->last_name,
          'email' => $user->email,
          'phone' => $user->phone,
          'role' => $user->profile->role,
          'authKey' => $user->createToken($request->device_name)->plainTextToken,
      );

      return $this->success($responseUser, 'Login successful');
    }

    public function registerAction(Request $request)
    {
        $user = null;
        if (empty($request->email) || empty($request->phone))
            return $this->fail('Email or Phone number required');
        if (!empty($request->email) || !empty($request->phone) && empty($request->password))
            return $this->fail('Password required');

        if (isset($request->phone) && empty($request->email))
            $user = User::where('phone', $request->phone)->first();
        if(isset($request->email) && empty($request->phone))
            $user = User::where('phone', $request->phone)->first();

        if ($user)
            return $this->fail('Account already exist');

        $name = $request->first_name . ' ' . $request->last_name;

        $newUser = User::create([
            'name' => $name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->phone),
        ]);

        $profile = Profile::create([
            'user_id' => $newUser->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        $responseUser = array(
            'user' => $profile,
        );

        return $this->success($responseUser, 'Login successful');
    }

    // logout
    public function logout()
    {
        $user = request()->user();
        $user->currentAccessToken()->delete();
        return $this->success('Logout Successful', 'You have successfully logged out.');
    }


}
