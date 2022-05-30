<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
   use HasFactory, InteractsWithMedia;
   protected $fillable = ['name', 'description','venue','latitude', 'longitude', 'start_date', 'end_date'];

   protected $appends = ['thumb_image_url'];

      /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($event) {
            $event->applications->delete();
            $event->fee->delete();
            $event->award->delete();
        });
    }


   public function registerMediaCollections(): void
   {
      $this->addMediaCollection('event_image')->singleFile();
   }

   public function getThumbImageUrlAttribute()
   {
      return $this->getFirstMediaUrl('event_image', 'thumb');
   }

   public function getImageUrlAttribute()
   {
      return $this->getFirstMediaUrl('event_image');
   }


   public function registerMediaConversions(Media $media = null): void
   {
      $this->addMediaConversion('thumb')
         ->width(368)
         ->height(232)
         ->sharpen(10);
   }

   public function getShortDescriptionAttribute()
   {
       return  \Illuminate\Support\Str::limit($this->description, 200);
   }

   /**
    * Get all of the applications for the Event
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
   public function applications()
   {
      return $this->hasMany(EventApplications::class);
   }

   /**
    * Get the user associated with the Event
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function fee()
   {
      return $this->hasOne(Fee::class);
   }

   public function award()
   {
      return $this->hasMany(Award::class);
   }

}
