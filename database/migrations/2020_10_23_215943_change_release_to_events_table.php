<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeReleaseToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("alter table events modify release_time_event timestamp null");
        DB::statement("alter table events modify expired_time_event timestamp null");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("alter table events modify release_time_event time not null");
        DB::statement("alter table events modify expired_time_event time null");
    }
}
