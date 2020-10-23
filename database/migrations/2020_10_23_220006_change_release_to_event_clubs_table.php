<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeReleaseToEventClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("alter table event_clubs modify release_time timestamp null");
        DB::statement("alter table event_clubs modify expired_time timestamp null");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("alter table event_clubs modify release_time time not null");
        DB::statement("alter table event_clubs modify expired_time time null");
    }
}
