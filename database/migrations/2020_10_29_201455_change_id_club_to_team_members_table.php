<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdClubToTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->index('id_pigeon');
            $table->foreignId('id_pigeon')->after('id_team')->references('id')->on('pigeons')->onDelete('cascade')->onUpdate('cascade');
            $table->dropForeign(['id_club']);
            $table->dropIndex(['id_club']);
            $table->dropColumn('id_club');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->index('id_club');
            $table->foreignId('id_club')->after('id_team')->references('id')->on('clubs')->onDelete('cascade')->onUpdate('cascade');
            $table->dropForeign(['id_pigeon']);
            $table->dropIndex(['id_pigeon']);
            $table->dropColumn('id_pigeon');
        });
    }
}
