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
            $table->string('name');
			$table->integer('type');
			$table->integer('duration');
			$table->string('location');
			$table->string('commitee_interest');
			$table->string('regional_bloc');
			$table->boolean('entry_visa');
			$table->boolean('first_time');
			$table->text('embassy_loaction');
			$table->dateTime('start');
			$table->dateTime('end');
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
