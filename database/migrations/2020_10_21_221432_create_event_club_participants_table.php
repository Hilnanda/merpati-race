<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventClubParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_club_participants', function (Blueprint $table) {
            $table->id();
            $table->index('id_pigeon');
            $table->foreignId('id_pigeon')->references('id')->on('pigeons')->onDelete('cascade')->onUpdate('cascade');
            $table->index('id_event_club');
            $table->foreignId('id_event_club')->references('id')->on('event_clubs')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_core');
            $table->boolean('is_basketed');
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
        Schema::dropIfExists('event_club_participants');
    }
}
