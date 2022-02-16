<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
   use HasFactory;

   protected $fillable = ['event_id', 'event_application_id', 'user_id', 'form_data'];

   /**
     * The roles that belong to the user.
   */
   public function roles()
   {
      return $this->belongsToMany(EventApplications::class, 'applicants', 'applicant_id', 'event_applications');
   }

}
