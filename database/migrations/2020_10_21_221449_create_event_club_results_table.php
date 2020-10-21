<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventClubResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_club_results', function (Blueprint $table) {
            $table->id();
            $table->decimal('speed');
            $table->index('id_event_club_participant');
            $table->foreignId('id_event_club_participant')->references('id')->on('event_club_participants')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('current_id_club')->nullable();
            $table->bigInteger('current_id_team')->nullable();
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
        Schema::dropIfExists('event_club_results');
    }
}
