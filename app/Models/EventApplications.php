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

   public function officials()
   {
      return $this->belongsToMany(Applicant::class, 'officials', 'applicant_id', 'event_id')->withPivot('type', 'role');
   }

   public function applicants()
   {
      // return $this->belongsToMany(User::class)->withPivot('form_data')->withTimestamps();
      return $this->belongsToMany(User::class)->using(EventApplicants::class)->withPivot('form_data')->withTimestamps();
   }

}
