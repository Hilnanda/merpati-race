<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUserToClubMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_members', function (Blueprint $table) {
            $table->index('id_user');
            $table->foreignId('id_user')->nullable()->after('id_club')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_members', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex(['id_user']);
            $table->dropColumn('id_user');
        });
    }
}
