<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
    Schema::dropIfExists('receipts');
      Schema::create('receipts', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('payment_id');
         $table->unsignedBigInteger('user_id');
         $table->unsignedBigInteger('receipt_code');
         $table->softDeletes();
         $table->timestamps();

         $table->foreign('payment_id')->references('id')->on('payments');
         $table->foreign('user_id')->references('id')->on('users');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('receipts');
   }
}
