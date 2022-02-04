<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property integer $id
 * @property integer $name
 * @property integer $email
 * @property string $password
 */

class User extends Authenticatable implements HasMedia
{
   use HasApiTokens, InteractsWithMedia, HasFactory, HasRoles, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'name',
      'email',
      'password',
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];

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

   public function profile()
   {
      return $this->hasOne(Profile::class);
   }

   public function officials()
   {
      return $this->belongsToMany(Event::class, 'officials', 'user_id', 'event_id')->withPivot('type', 'role');
   }
}
