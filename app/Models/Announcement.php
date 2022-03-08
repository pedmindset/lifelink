<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
   use HasFactory;

   protected $fillable = ['content', 'subject', 'uuid'];

   public function tags()
   {
      return $this->belongsToMany(Tag::class, 'announcement_tags', 'tag_id', 'announcement_id');
   }
}
