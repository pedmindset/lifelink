<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventApplicants extends Pivot
{
   use HasFactory;

   // protected $fillable = ['form_data'];

   protected $casts = [
      'form_data' => 'array',
   ];
}
