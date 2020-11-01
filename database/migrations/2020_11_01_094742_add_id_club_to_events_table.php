<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdClubToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->index('id_club');
            $table->foreignId('id_club')->nullable()->after('branch_event')->references('id')->on('clubs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['id_club']);
            $table->dropIndex(['id_club']);
            $table->dropColumn('id_club');
            $table->dropForeign(['id_user']);
            $table->dropIndex(['id_user']);
            $table->dropColumn('id_user');
        });
    }
}
