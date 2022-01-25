<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
   use HasFactory;

   protected $fillable = ['name', 'type', 'location', 'commitee_interest', 'regional_bloc', 'entry_visa', 'first_time', 'embassy_loaction', 'start', 'end'];

   /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
   public function award()
   {
      return $this->hasOne(Award::class);
   }

   /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
   public function conference_detail()
   {
      return $this->hasOne(ConferenceDetail::class);
   }

   /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
   public function payments()
   {
      return $this->hasMany(Payment::class);
   }
   /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
   public function officials()
   {
      return $this->hasMany(Official::class);
   }

   /**
    * Get all of the members for the Conference
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function members()
   {
      return $this->hasMany(Member::class);
   }
}
