<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
   use HasFactory;

   protected $fillable = ['conference_id', 'title', 'uuid'];

   public function conference()
   {
      $this->belongsTo(Conference::class);
   }
}
