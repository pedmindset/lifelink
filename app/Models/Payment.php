<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $profile_id
 * @property integer $conference_id
 * @property string $uuid
 * @property string $transaction_code
 * @property string $description
 * @property float $amount
 * @property string $status
 * @property string $payment_method
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */

class Payment extends Model
{
   use HasFactory;

   protected $fillable = ['user_id', 'event_id', 'isAluminia', 'type', 'uuid','transaction_code','description','amount', 'status', 'payment_method'];

   /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function event()
   {
      return $this->belongsTo(Event::class);
   }

   /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user()
   {
      return $this->belongsTo(User::class);
   }

   /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   // public function receipt()
   // {
   //    return $this->hasOne(Invoice::class);
   // }

}
