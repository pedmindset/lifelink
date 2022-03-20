<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventToAwardsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()   
   {
      Schema::table('awards', function (Blueprint $table) {
         $table->unsignedBigInteger('event_id');
         // $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::table('awards', function (Blueprint $table) {
         $table->dropColumn('event_id');
     });
   }
}
