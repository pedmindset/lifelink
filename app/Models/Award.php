<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Award extends Model implements HasMedia
{
   use HasFactory, InteractsWithMedia;

   protected $fillable = ['event_id', 'name', 'description', 'uuid'];

   protected $appends = ['thumb_image_url'];

   public function registerMediaCollections(): void
   {
      $this->addMediaCollection('award_image')->singleFile();
   }

   public function getThumbImageUrlAttribute()
   {
      return $this->getFirstMediaUrl('award_image', 'thumb');
   }

   /**
    * Get the event that owns the Award
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function event()
   {
      return $this->belongsTo(Event::class);
   }

   public function user()
   {
      return $this->belongsToMany(User::class, 'award_users_pivot', 'user_id', 'award_id');
   }

}
