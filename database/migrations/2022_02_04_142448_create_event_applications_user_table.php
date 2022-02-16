<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventApplicationsUserTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('event_applications_user', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('event_applications_id');
         $table->unsignedBigInteger('user_id');
         $table->json('form_data');
         $table->timestamps();

         $table->foreign('event_applications_id')->references('id')->on('event_applications');
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
      Schema::dropIfExists('event_applications_user');
   }
}
