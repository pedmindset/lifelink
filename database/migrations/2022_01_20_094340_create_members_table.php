<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('members', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('conference_id');
         $table->unsignedBigInteger('profile_id');
         $table->timestamps();

         $table->foreign('conference_id')->references('id')->on('conferences');
         $table->foreign('profile_id')->references('id')->on('profile_id');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('members');
   }
}
