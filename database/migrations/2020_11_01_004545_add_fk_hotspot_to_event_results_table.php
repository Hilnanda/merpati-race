<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkHotspotToEventResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_results', function (Blueprint $table) {
            $table->index('id_event_hotspot');
            $table->foreignId('id_event_hotspot')->after('id_event_participant')->references('id')->on('event_hotspots')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_results', function (Blueprint $table) {
            $table->dropForeign(['id_event_hotspot']);
            $table->dropIndex(['id_event_hotspot']);
            $table->dropColumn('id_event_hotspot');
        });
    }
}
