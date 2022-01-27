<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardEventsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('award_event_applications_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('award_id')->index();
            $table->unsignedBigInteger('event_application_id')->index();
            $table->timestamps();

            $table->foreign('award_id')->references('id')->on('awards')->onDelete('cascade');
            $table->foreign('event_application_id')->references('id')->on('event_applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('award_events_pivot');
    }
}
