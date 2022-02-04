<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('officials', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('event_id');
         $table->unsignedBigInteger('user_id');
         $table->string('type'); // default or volunteer
         $table->string('role');
         $table->timestamps();

         $table->foreign('event_id')->references('id')->on('events');
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
      Schema::dropIfExists('officials');
   }
}
