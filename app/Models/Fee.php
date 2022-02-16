<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
   use HasFactory;

   protected $fillable = ['event_id', 'fee_uuid', 'standard_amount', 'international_amount', 'early_bird_amount', 'late_amount', 'regular_date', 'early_bird_date', 'late_date'];

   public function event()
   {
      return $this->belongsTo(Event::class);
   }
}
