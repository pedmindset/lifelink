<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('applicants', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('event_id');
         $table->unsignedBigInteger('event_application_id');
         $table->unsignedBigInteger('user_id');
         $table->json('form_data');
         $table->timestamps();

         $table->foreign('event_id')->references('id')->on('events');
         $table->foreign('event_application_id')->references('id')->on('event_applications');
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
      Schema::dropIfExists('applicants');
   }
}
