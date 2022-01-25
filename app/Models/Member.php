<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
   use HasFactory;

   protected $fillable = ['conference_id', 'profile_id'];

  /**
    * Get the conference that owns the Member
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function conference()
   {
      return $this->belongsTo(Conference::class);
   }
  /**
    * Get the profile that owns the Member
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function profile()
   {
      return $this->belongsTo(Profile::class);
   }

}
