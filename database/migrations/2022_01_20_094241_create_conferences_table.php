<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConferencesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('conferences', function (Blueprint $table) {
         $table->id();
         $table->string('name')->nullable();
         $table->integer('type')->nullable();
         $table->string('location')->nullable();
         $table->string('commitee_interest')->nullable();
         $table->string('regional_bloc')->nullable();
         $table->boolean('entry_visa')->nullable();
         $table->boolean('first_time')->nullable();
         $table->text('embassy_loaction')->nullable();
         $table->dateTime('start')->nullable();
         $table->dateTime('end')->nullable();
         $table->softDeletes();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('conferences');
   }
}
