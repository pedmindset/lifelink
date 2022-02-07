<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('fees', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('event_id');
         //$table->string('type')->nullable(); // local or foreign
         // $table->decimal('part_payment', 13, 4)->nullable();
         $table->uuid('fee_uuid')->nullable();
         $table->decimal('standard_amount', 13, 4)->nullable();
         $table->decimal('international_amount', 13, 4)->nullable();
         $table->decimal('early_bird_amount', 13, 4)->nullable();
         $table->decimal('late_amount', 13, 4)->nullable();
         $table->dateTime('regular_date')->nullable();
         $table->dateTime('early_bird_date')->nullable();
         $table->dateTime('late_date')->nullable();
         $table->timestamps();

         $table->foreign('event_id')->references('id')->on('events');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('fees');
   }
}
