<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   use HasFactory;
   protected $fillable = ['name', 'description', 'start_date', 'end_date'];

   /**
    * Get all of the applications for the Event
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
   public function applications()
   {
      return $this->hasMany(EventApplications::class);
   }

}
