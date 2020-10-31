<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteEventClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('event_club_results');
        Schema::dropIfExists('event_club_participants');
        Schema::dropIfExists('event_clubs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('event_club_results');
        Schema::create('event_club_participants');
        Schema::create('event_clubs');
    }
}
