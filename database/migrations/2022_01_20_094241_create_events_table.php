<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('events', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('compony_id');
         $table->unsignedBigInteger('fee_id');
         $table->string('name')->nullable();
         $table->dateTime('start_date')->nullable();
         $table->dateTime('end_date')->nullable();
         $table->softDeletes();
         $table->timestamps();

         $table->foreign('compony_id')->references('id')->on('componies');
         $table->foreign('fee_id')->references('id')->on('fees');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('events');
   }
}
