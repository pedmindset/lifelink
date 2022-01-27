<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('announcements', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('event_id')->nullable();
         $table->uuid('uuid');
         $table->string('type');
         $table->string('subject');
         $table->text('content');
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
      Schema::dropIfExists('announcements');
   }
}
