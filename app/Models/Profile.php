<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $first_name
 * @property string $last_name
 * @property string $address
 * @property string $email
 * @property float $phone
 * @property boolean $aluminia
 * @property boolean $school
 * @property boolean $aluminia
 * @property boolean $aluminia
 * @property string $fb_token
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */

class Profile extends Model
{
   use HasFactory, Notifiable;

   protected $fillable = ['user_id','first_name','last_name','address','email','phone',
         'school', 'level','coarse', 'city','country', 'nationality', 'aluminia', 'fb_token'];

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   
}
