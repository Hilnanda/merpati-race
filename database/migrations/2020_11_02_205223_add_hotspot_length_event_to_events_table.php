<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHotspotLengthEventToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->integer('hotspot_length_event')->after('info_event');
            DB::statement('alter table events modify lat_event double null');
            DB::statement('alter table events modify lng_event double null');
            $table->string('address_event')->nullable()->change();
            $table->dropColumn('release_time_event');
            $table->dropColumn('expired_time_event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('hotspot_length_event');
            DB::statement('alter table events modify lat_event double not null');
            DB::statement('alter table events modify lng_event double not null');
            $table->string('address_event')->change();
            $table->timestamp('release_time_event')->nullable()->after('address_event');
            $table->timestamp('expired_time_event')->nullable()->after('due_join_date_event');
        });
    }
}
