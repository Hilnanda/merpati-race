<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrentIdClubToEventResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_results', function (Blueprint $table) {
            $table->bigInteger('current_id_club')->nullable()->after('id_event_participant');
            $table->bigInteger('current_id_team')->nullable()->after('current_id_club');
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
            $table->dropColumn('current_id_club');
            $table->dropColumn('current_id_team');
        });
    }
}
