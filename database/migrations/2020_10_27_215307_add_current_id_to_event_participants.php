<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrentIdToEventParticipants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_participants', function (Blueprint $table) {
            $table->bigInteger('current_id_club')->nullable()->after('is_basketed');
            $table->bigInteger('current_id_team')->nullable()->after('current_id_club');
            $table->timestamp('active_at')->nullable()->after('current_id_team');
            $table->dropColumn('is_basketed');
            $table->timestamp('basketed_at')->nullable()->after('is_core');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_participants', function (Blueprint $table) {
            $table->dropColumn('current_id_club');
            $table->dropColumn('current_id_team');
            $table->dropColumn('active_at');
            $table->dropColumn('basketed_at');
            $table->boolean('is_basketed')->after('is_core');
        });
    }
}
