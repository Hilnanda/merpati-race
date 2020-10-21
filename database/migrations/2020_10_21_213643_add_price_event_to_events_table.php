<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceEventToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->double('price_event')->after('expired_time_event');
            $table->double('lat_event_end')->nullable()->after('lng_event');
            $table->double('lng_event_end')->nullable()->after('lat_event_end');
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
            $table->dropColumn('price_event');
            $table->dropColumn('lat_event_end');
            $table->dropColumn('lng_event_end');
        });
    }
}
