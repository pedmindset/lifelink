<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementTagsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('announcement_tags', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('announcement_id');
         $table->unsignedBigInteger('tag_id');
         $table->timestamps();

         $table->foreign('announcement_id')->references('id')->on('announcements');
         $table->foreign('tag_id')->references('id')->on('tags');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('announcement_tags');
   }
}
