<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $profile_id
 * @property integer $payment_id
 * @property string $receipt_code
 */

class Receipt extends Model
{
   use HasFactory;

   protected $fillable = ['profile_id', 'payment_id', 'receipt_code'];

   /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function customer()
   {
      return $this->belongsTo(Profile::class);
   }

   /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function payment()
   {
      return $this->belongsTo(Payment::class);
   }
}
