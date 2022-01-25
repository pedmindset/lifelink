<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenceDetail extends Model
{
   use HasFactory;

   protected $fillable = ['conference_id','token','form_data'];

   public function conference()
   {
      return $this->belongsTo(Conference::class);
   }
}
