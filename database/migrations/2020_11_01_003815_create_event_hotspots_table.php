<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventHotspotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_hotspots', function (Blueprint $table) {
            $table->id();
            $table->index('id_event');
            $table->foreignId('id_event')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('release_time_hotspot')->nullable();
            $table->timestamp('expired_time_hotspot')->nullable();
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
        Schema::dropIfExists('event_hotspots');
    }
}
