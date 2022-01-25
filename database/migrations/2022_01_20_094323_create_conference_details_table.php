<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferenceDetailsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('conference_details', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('conference_id');
         $table->string('token')->nullable();
         $table->text('form_data')->nullable();
         $table->softDeletes();
         $table->timestamps();

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
      Schema::dropIfExists('conference_details');
   }
}
