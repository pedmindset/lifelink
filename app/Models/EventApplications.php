<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventApplications extends Model
{
   use HasFactory;

   protected $fillable = ['event_id','name', 'description','schema'];

   protected $casts = [
      'schema' => 'array',
   ];

   /**
    * Get the event that owns the EventApplication
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function event()
   {
      return $this->belongsTo(Event::class);
   }

}
