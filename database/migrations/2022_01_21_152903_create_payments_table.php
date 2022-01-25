<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('payments', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('profile_id')->nullable();
         $table->unsignedBigInteger('conference_id')->nullable();
         $table->uuid('uuid')->nullable();
         $table->string('transaction_code')->nullable();
         $table->string('description')->nullable();
         $table->decimal('amount', 13, 4)->nullable();
         $table->string('status')->nullable();
         $table->string('payment_method')->nullable();
         $table->softDeletes();
         $table->timestamps();

         $table->foreign('profile_id')->references('id')->on('profiles');
         $table->foreign('conference_id')->references('id')->on('conferences');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('payments');
   }
}
