<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $first_name
 * @property string $last_name
 * @property string $address
 * @property string $email
 * @property float $phone
 * @property string $aluminia
 * @property string $fb_token
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */

class Profile extends Model implements HasMedia
{
   use InteractsWithMedia, HasFactory, Notifiable;

   protected $fillable = ['user_id','first_name','last_name','address','email','phone','aluminia', 'fb_token'];

   protected $appends = ['thumb_image_url'];

   public function registerMediaCollections(): void
   {
      $this->addMediaCollection('profile_image')->singleFile();
   }

   public function getThumbImageUrlAttribute()
   {
      return $this->getFirstMediaUrl('profile_image', 'thumb');
   }

   public function registerMediaConversions(Media $media = null): void
   {
      $this->addMediaConversion('thumb')
         ->width(368)
         ->height(232)
         ->sharpen(10);
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   
}
